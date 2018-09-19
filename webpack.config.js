const webpack = require('webpack');
const path = require('path');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');
const CopyWebpackPlugin = require('copy-webpack-plugin');
const WebpackAssetsManifest = require('webpack-assets-manifest');
const UglifyJSPlugin = require('uglifyjs-webpack-plugin');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');

const isDev = process.env.NODE_ENV !== 'production';

const BuildConfig = {
	themeName: 'aposhproduction',
	proxy: 'http://aposh:8888',
	host: 'localhost',
	port: 3000
};

if (isDev) {
	BuildConfig.publicPath = `/content/themes/${BuildConfig.themeName}/dist/`;
} else {
	BuildConfig.publicPath = `/content/themes/${BuildConfig.themeName}/dist/`;
}

const config = {
	entry: {
		app: './js/index.js',
		vendor: ['babel-polyfill']
	},
	output: {
		filename: isDev ? 'js/[name].js' : 'js/[hash].[name].js',
		path: path.resolve(__dirname, 'dist'),
		publicPath: BuildConfig.publicPath,
		pathinfo: isDev
	},
	devtool: isDev ? '#cheap-module-source-map' : false,
	stats: true,
	module: {
		rules: [
			{
				test: /\.(s*)css$/,
				use: [
					{
						loader: isDev ? 'style-loader' : MiniCssExtractPlugin.loader
					},
					{
						loader: 'css-loader'
					},
					{
						loader: 'postcss-loader'
					},
					{
						loader: 'sass-loader'
					}
				]
			},
			{
				test: /\.js$/,
				exclude: /(node_modules|bower_components)/,
				loader: 'babel-loader'
			},
			{
				test: /\.(png|jpg|gif|svg|ico)$/,
				use: [
					{
						loader: 'file-loader',
						options: {
							name: './images/[name].[ext]'
						}
					}
				],
				exclude: path.resolve('./fonts')
			},
			{
				test: /\.(ttf|eot|woff|woff2|svg)$/,
				use: {
					loader: 'file-loader',
					options: {
						name: 'fonts/[name].[ext]'
					}
				},
				include: [path.resolve('./scss'), path.resolve('./fonts')],
				exclude: path.resolve('./images')
			}
		]
	},
	plugins: [
		new CopyWebpackPlugin([{ from: '**/*.png', to: 'images/' }, { from: '**/*.jpg', to: 'images/' }, { from: '**/*.svg', to: 'images/' }], {
			context: './images'
		}),
		new MiniCssExtractPlugin({
			filename: isDev ? 'css/[name].css' : 'css/[name].[hash].css',
			allChunks: true
		}),
		new WebpackAssetsManifest({
			output: 'assets.json',
			space: 2,
			writeToDisk: false,
			publicPath: BuildConfig.publicPath
		})
	]
};

if (isDev) {
	// Config.entry = addHot(config.entry);
	config.plugins = config.plugins.concat([new webpack.optimize.OccurrenceOrderPlugin(), new webpack.NoEmitOnErrorsPlugin()]);
} else {
	config.plugins.push(new UglifyJSPlugin());
}

module.exports = config;

// Function addHot(entry) {
// 	const results = {};
//
// 	Object.keys(entry).forEach(name => {
// 		results[name] = Array.isArray(entry[name]) ?
// 			entry[name].slice(0) :
// 			[entry[name]];
// 		results[name].unshift(`${__dirname}/hmr.js`);
// 	});
// 	return results;
// }
