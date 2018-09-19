const { deploy } = require('sftp-sync-deploy');

let config = {
	host: 'aposhproduction.com', // Required.
	port: 22, // Optional, Default to 22.
	username: 'aposh', // Requiredd
	privateKey: '/Users/maxbaun/.ssh/id_rsa', // Optional.
	localDir: '.', // Required, Absolute or relative to cwd.
	remoteDir: '/var/www/html/content/themes/aposhproduction' // Required, Absolute path only.
};

let options = {
	dryRun: false, // Enable dry-run mode. Default to false
	exclude: [
		// exclude patterns (glob)
		'node_modules',
		'.git',
		'js/vendor'
	],
	excludeMode: 'ignore', // Behavior for excluded files ('remove' or 'ignore'), Default to 'remove'.
	forceUpload: false // Force uploading all files, Default to false(upload only newer files).
};

deploy(config, options)
	.then(() => {
		console.log('success!');
	})
	.catch(err => {
		console.error('error! ', err);
	});
