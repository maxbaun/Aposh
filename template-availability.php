<?php 
  /* Template Name: Availability Template */
?>
<?php get_header(); the_post(); ?>

<div class="page-banner">
  <h1><?php echo get_the_title(); ?></h1>
</div>
<div id="page-content" style="padding-bottom:30px;">
  <div class="container">
    <form method="post" class="availability-form" action="http://poshlogin.com/request_information.asp" onsubmit=
    'return submitIt(this);' name="reqinfoform">
      <div class="row">
        <div class="col-md-6">
          
            <div class="row">
              <?php
                $month = isset($_POST["aposh-month"]) ? $_POST["aposh-month"] : '';
                $day = isset($_POST["aposh-day"]) ? $_POST["aposh-day"] : '';
                $year = isset($_POST["aposh-year"]) ? $_POST["aposh-year"] : '';
              ?>
              <div class="col-md-4">
                <div class="form-control-wrapper" style="margin-bottom:0px;">
                  <?php echo do_shortcode('[month-select selected='.$month.' class="form-control" name="month"][/month-select]'); ?>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-control-wrapper" style="margin-bottom:0px;">
                  <?php echo do_shortcode('[day-select selected='.$day.' class="form-control" name="day"][/day-select]'); ?>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-control-wrapper" style="margin-bottom:0px;">
                  <?php echo do_shortcode('[year-select selected='.$year.' class="form-control" name="year"][/year-select]'); ?>
                </div>
              </div>
            </div>
          
          <div class="form-control-wrapper">
            <select class="selectpicker dropdown form-control" name="event_type" style='width:240px'>
              <option value=''>
                Event Type
              </option>

              <option>
                Birthday Party
              </option>

              <option>
                Class Reunion
              </option>

              <option>
                Company Holiday Party
              </option>

              <option>
                Corporate Event
              </option>

              <option>
                Fundraiser
              </option>

              <option>
                Graduation Celebration
              </option>

              <option>
                School Dance
              </option>

              <option>
                Wedding
              </option>

              <option>
                Private Party
              </option>

              <option>
                Equipment Rental
              </option>

              <option>
                Photobooth
              </option>

              <option>
                Other / Not Listed
              </option>
            </select>
          </div>            
          <div class="form-control-wrapper">
            <select class="selectpicker dropdown form-control" name='req_start_time'>
              <option value=''>
                Start Time
              </option>          
              <option value='12:00 pm'>
                Noon
              </option>

              <option value='12:30 pm'>
                12:30 pm
              </option>

              <option value='1:00 pm'>
                1:00 pm
              </option>

              <option value='1:30 pm'>
                1:30 pm
              </option>

              <option value='2:00 pm'>
                2:00 pm
              </option>

              <option value='2:30 pm'>
                2:30 pm
              </option>

              <option value='3:00 pm'>
                3:00 pm
              </option>

              <option value='3:30 pm'>
                3:30 pm
              </option>

              <option value='4:00 pm'>
                4:00 pm
              </option>

              <option value='4:30 pm'>
                4:30 pm
              </option>

              <option value='5:00 pm'>
                5:00 pm
              </option>

              <option value='5:30 pm'>
                5:30 pm
              </option>

              <option value='6:00 pm'>
                6:00 pm
              </option>

              <option value='6:30 pm'>
                6:30 pm
              </option>

              <option value='7:00 pm'>
                7:00 pm
              </option>

              <option value='7:30 pm'>
                7:30 pm
              </option>

              <option value='8:00 pm'>
                8:00 pm
              </option>

              <option value='8:30 pm'>
                8:30 pm
              </option>

              <option value='9:00 pm'>
                9:00 pm
              </option>

              <option value='9:30 pm'>
                9:30 pm
              </option>

              <option value='10:00 pm'>
                10:00 pm
              </option>

              <option value='10:30 pm'>
                10:30 pm
              </option>

              <option value='11:00 pm'>
                11:00 pm
              </option>

              <option value='11:30 pm'>
                11:30 pm
              </option>

              <option value='12:00 am'>
                Midnight
              </option>

              <option value='12:30 am'>
                12:30 am
              </option>

              <option value='1:00 am'>
                1:00 am
              </option>

              <option value='1:30 am'>
                1:30 am
              </option>

              <option value='2:00 am'>
                2:00 am
              </option>

              <option value='2:30 am'>
                2:30 am
              </option>

              <option value='3:00 am'>
                3:00 am
              </option>

              <option value='3:30 am'>
                3:30 am
              </option>

              <option value='4:00 am'>
                4:00 am
              </option>

              <option value='4:30 am'>
                4:30 am
              </option>

              <option value='5:00 am'>
                5:00 am
              </option>

              <option value='5:30 am'>
                5:30 am
              </option>

              <option value='6:00 am'>
                6:00 am
              </option>

              <option value='6:30 am'>
                6:30 am
              </option>

              <option value='7:00 am'>
                7:00 am
              </option>

              <option value='7:30 am'>
                7:30 am
              </option>

              <option value='8:00 am'>
                8:00 am
              </option>

              <option value='8:30 am'>
                8:30 am
              </option>

              <option value='9:00 am'>
                9:00 am
              </option>

              <option value='9:30 am'>
                9:30 am
              </option>

              <option value='10:00 am'>
                10:00 am
              </option>

              <option value='10:30 am'>
                10:30 am
              </option>

              <option value='11:00 am'>
                11:00 am
              </option>

              <option value='11:30 am'>
                11:30 am
              </option>
            </select>      
          </div>
          <div class="form-control-wrapper">
            <select class="selectpicker dropdown form-control" name='req_end_time'>
              <option value=''>
                End Time
              </option>         
              <option value='12:00 pm'>
                Noon
              </option>

              <option value='12:30 pm'>
                12:30 pm
              </option>

              <option value='1:00 pm'>
                1:00 pm
              </option>

              <option value='1:30 pm'>
                1:30 pm
              </option>

              <option value='2:00 pm'>
                2:00 pm
              </option>

              <option value='2:30 pm'>
                2:30 pm
              </option>

              <option value='3:00 pm'>
                3:00 pm
              </option>

              <option value='3:30 pm'>
                3:30 pm
              </option>

              <option value='4:00 pm'>
                4:00 pm
              </option>

              <option value='4:30 pm'>
                4:30 pm
              </option>

              <option value='5:00 pm'>
                5:00 pm
              </option>

              <option value='5:30 pm'>
                5:30 pm
              </option>

              <option value='6:00 pm'>
                6:00 pm
              </option>

              <option value='6:30 pm'>
                6:30 pm
              </option>

              <option value='7:00 pm'>
                7:00 pm
              </option>

              <option value='7:30 pm'>
                7:30 pm
              </option>

              <option value='8:00 pm'>
                8:00 pm
              </option>

              <option value='8:30 pm'>
                8:30 pm
              </option>

              <option value='9:00 pm'>
                9:00 pm
              </option>

              <option value='9:30 pm'>
                9:30 pm
              </option>

              <option value='10:00 pm'>
                10:00 pm
              </option>

              <option value='10:30 pm'>
                10:30 pm
              </option>

              <option value='11:00 pm'>
                11:00 pm
              </option>

              <option value='11:30 pm'>
                11:30 pm
              </option>

              <option value='12:00 am'>
                Midnight
              </option>

              <option value='12:30 am'>
                12:30 am
              </option>

              <option value='1:00 am'>
                1:00 am
              </option>

              <option value='1:30 am'>
                1:30 am
              </option>

              <option value='2:00 am'>
                2:00 am
              </option>

              <option value='2:30 am'>
                2:30 am
              </option>

              <option value='3:00 am'>
                3:00 am
              </option>

              <option value='3:30 am'>
                3:30 am
              </option>

              <option value='4:00 am'>
                4:00 am
              </option>

              <option value='4:30 am'>
                4:30 am
              </option>

              <option value='5:00 am'>
                5:00 am
              </option>

              <option value='5:30 am'>
                5:30 am
              </option>

              <option value='6:00 am'>
                6:00 am
              </option>

              <option value='6:30 am'>
                6:30 am
              </option>

              <option value='7:00 am'>
                7:00 am
              </option>

              <option value='7:30 am'>
                7:30 am
              </option>

              <option value='8:00 am'>
                8:00 am
              </option>

              <option value='8:30 am'>
                8:30 am
              </option>

              <option value='9:00 am'>
                9:00 am
              </option>

              <option value='9:30 am'>
                9:30 am
              </option>

              <option value='10:00 am'>
                10:00 am
              </option>

              <option value='10:30 am'>
                10:30 am
              </option>

              <option value='11:00 am'>
                11:00 am
              </option>

              <option value='11:30 am'>
                11:30 am
              </option>
            </select>             
          </div>      
          <div class="form-control-wrapper">
            <select class="selectpicker dropdown form-control" name="event_location_id" width="260" style='width:260px'>
              <option value="0">
                Event Venue
              </option>

              <option value="106053">
                1120 E. Diehl Road - Naperville, IL
              </option>

              <option value="105978">
                1801 Naper Blvd. - Naperville, IL
              </option>

              <option value="106784">
                200 West Jackson - Chicago, IL
              </option>

              <option value="105826">
                Abbington Distinctive Banquets - Glen Ellyn, IL
              </option>

              <option value="106147">
                Adler Planetarium - Chicago, IL
              </option>

              <option value="106802">
                Allgauers Hilton - Northbrook, IL
              </option>

              <option value="106411">
                Alpine Banquets - Darrien, IL
              </option>

              <option value="106643">
                Am Shalom - Glencoe, IL
              </option>

              <option value="104264">
                Ambassador Banquets - Hobart, IN
              </option>

              <option value="105837">
                AMC Glen 10 - Glenview, IL
              </option>

              <option value="104262">
                Arboretum Club - Buffalo Grove, IL
              </option>

              <option value="105823">
                Architectural Artifacts - Chicago, IL
              </option>

              <option value="105842">
                Arrowhead Golf Club - Wheaton, IL
              </option>

              <option value="105892">
                Ashton Place - Willowbrook, IL
              </option>

              <option value="106137">
                Ashyana Banquet - Downers Grove, IL
              </option>

              <option value="104632">
                Bella Banquets - Countryside, IL
              </option>

              <option value="105834">
                Bella Via - Highland Park, IL
              </option>

              <option value="105806">
                Belvedere Events &amp; Banquets - Elk Grove Village, IL
              </option>

              <option value="106978">
                Belvedere North High School - Belvedere, IL
              </option>

              <option value="106551">
                Bernotas Middle School - Crystal Lake, IL
              </option>

              <option value="106941">
                Beth Judea Congregation Social Hall - Long Grove, IL
              </option>

              <option value="105814">
                Bloomingdale Golf Club - Bloomingdale, IL
              </option>

              <option value="105945">
                Blue Heron - South Bend, IN
              </option>

              <option value="106180">
                B'nai Jehoshua Beth Elohim - Deerfield, IL
              </option>

              <option value="106771">
                B'Nai Torah - Highland Park, IL
              </option>

              <option value="104046">
                Bobak's Signature Events - Woodridge, IL
              </option>

              <option value="106299">
                Brides Parents House - Stevensville, MI
              </option>

              <option value="106263">
                Bristol Court Banquet Hall - Mount Prospect, IL
              </option>

              <option value="105851">
                Brookfield Zoo - Brookfield, IL
              </option>

              <option value="106320">
                Buffalo Grove High School - Buffalo Grove, IL
              </option>

              <option value="106795">
                Butterfield Country Club - Oak Brook, IL
              </option>

              <option value="104048">
                Cantigny Golf Course - Wheaton, IL
              </option>

              <option value="104042">
                Cantigny Golf Course - Winfield, IL
              </option>

              <option value="105816">
                Carleton Hotel - Oak Park, IL
              </option>

              <option value="105807">
                Carlisle Banquets - Lombard, IL
              </option>

              <option value="106969">
                Carmel High School - Mundelein, IL
              </option>

              <option value="105904">
                Carriage Greens Country Club - Darien, IL
              </option>

              <option value="106227">
                Cary High School - Cary, IL
              </option>

              <option value="106280">
                CD and Me - Franfort, IL
              </option>

              <option value="106735">
                Central Middle School - Glencoe, IL
              </option>

              <option value="104133">
                Chandlers - Schaumburg, IL
              </option>

              <option value="104021">
                Chateau Del Mar - Hickory Hills, IL
              </option>

              <option value="104038">
                Chevy Chase Country Club - Wheeling, IL
              </option>

              <option value="105827">
                Chicago Marriott-Naperville - Naperville, IL
              </option>

              <option value="106722">
                Chicago Yacht Club - Chicago, IL
              </option>

              <option value="106723">
                Chicago Yacht Club - Chicago, IL
              </option>

              <option value="106724">
                Chicago Yacht Club - Chicago, IL
              </option>

              <option value="106696">
                Citizens Park - Barrington, IL
              </option>

              <option value="106916">
                Cloister in the Woods - Munster, IN
              </option>

              <option value="105811">
                Concorde Banquets - Kildeer, IL
              </option>

              <option value="106921">
                Contingo - Chicago, IL
              </option>

              <option value="104037">
                Cotillion Banquets - Palatine, IL
              </option>

              <option value="105968">
                Crystal Palace - Mount Prospect, IL
              </option>

              <option value="106423">
                Devon Seafood - Chicago, IL
              </option>

              <option value="106920">
                DL Loft - Chicago, IL
              </option>

              <option value="106242">
                Double Tree - ,
              </option>

              <option value="105966">
                Doubletree- Oak Brook - Oak Brook, IL
              </option>

              <option value="106267">
                Downers Grove Moose Lodge - Downers Grove, IL
              </option>

              <option value="104045">
                Drury Lane - Oak Brook Terrace, IL
              </option>

              <option value="105820">
                Dunham Woods Riding Club - Wayne, IL
              </option>

              <option value="104366">
                Eagle Brook Country Club - Geneva, IL
              </option>

              <option value="106665">
                Eagle Ridge Resort - Galena, IL
              </option>

              <option value="103973">
                Eaglewood Resort - Itasca, IL
              </option>

              <option value="106885">
                East Bank Club - Chicago, IL
              </option>

              <option value="106115">
                Elawa Farm - Lake Forest, IL
              </option>

              <option value="104580">
                Empress Banquets - Addison, IL
              </option>

              <option value="105891">
                English Bar and Restaurant - Chicago, IL
              </option>

              <option value="105850">
                European Crystal Banquets - Arlington Heights, IL
              </option>

              <option value="105977">
                Floating World Gallery - Chicago, IL
              </option>

              <option value="105835">
                Fountain Blue - Des Plaines, IL
              </option>

              <option value="105602">
                Four Rivers - Channahon, IL
              </option>

              <option value="106352">
                Four Seasons Hotel Chicago - Chicago, IL
              </option>

              <option value="106593">
                Galaxy Banquets - Schiller Park, IL
              </option>

              <option value="105817">
                Galleria Marchetti - Chicago, IL
              </option>

              <option value="104044">
                Glen Club - Glenview, IL
              </option>

              <option value="105903">
                Glen Oaks Country Club - Glen Ellyn, IL
              </option>

              <option value="106641">
                Glen View Club - Golf, IL
              </option>

              <option value="105815">
                Grand Ballroom - Joliet, IL
              </option>

              <option value="106780">
                Grand Geneva Resort - Lake Geneva, WI
              </option>

              <option value="105681">
                Herrington Inn and Spa - Geneva, IL
              </option>

              <option value="106114">
                Highland Park Country Club - Highland Park, IL
              </option>

              <option value="106868">
                Highland Park Rec Center - ,
              </option>

              <option value="106642">
                Highlands of Elgin Golf Course - Elgin, IL
              </option>

              <option value="105831">
                Hilton Orrington - Evanston, IL
              </option>

              <option value="106358">
                Holiday Inn - Chicago, IL
              </option>

              <option value="106130">
                Holiday Inn North Shore - Skokie, IL
              </option>

              <option value="105808">
                Hotel Baker - St. Charles, IL
              </option>

              <option value="106235">
                Hotel Palomar - Chicago, IL
              </option>

              <option value="106283">
                Hyatt Lisle - Lisle, IL
              </option>

              <option value="106388">
                Hyatt McCormick Place - Chicago, IL
              </option>

              <option value="106640">
                Ignite Class Studio - Chicago, IL
              </option>

              <option value="105819">
                Jacob Henry Mansion - Joliet, IL
              </option>

              <option value="106181">
                Jewish Reconstructionist - Evanston, IL
              </option>

              <option value="106915">
                Joe's Bar - Chicago, IL
              </option>

              <option value="105832">
                Joliet West High School - Joliet, IL
              </option>

              <option value="106353">
                Kinzie Chophous - Chicago, IL
              </option>

              <option value="105809">
                Klehm Arboretum and Botanic Garden - Rockford, IL
              </option>

              <option value="106088">
                Knights Of Columbus-Kankakee - Kankakee, IL
              </option>

              <option value="106569">
                Lake Lawn Lodge - Delevan, WI
              </option>

              <option value="106835">
                Lehmann Mansion - Lake Villa, IL
              </option>

              <option value="106932">
                Libertyville High School - Libertyville, IL
              </option>

              <option value="105853">
                Local 399 - Chicago, IL
              </option>

              <option value="105963">
                Lone Tree Manor - Niles, IL
              </option>

              <option value="106854">
                Lucuna Artists Lofts - ,
              </option>

              <option value="106783">
                Lux Bar - Chicago, IL
              </option>

              <option value="105821">
                MacArthur Middle School - Prospect Heights, IL
              </option>

              <option value="105830">
                Maggiano's- Schaumburg - Schaumburg, IL
              </option>

              <option value="105935">
                Maine West High School - Des Plaines, IL
              </option>

              <option value="105818">
                Manzo's Banquets - Des Plaines, IL
              </option>

              <option value="106744">
                Marriott Chicago - Chicago, IL
              </option>

              <option value="106674">
                Marriott Midway - ,
              </option>

              <option value="106116">
                Mayfield Banquets - Chicago, IL
              </option>

              <option value="106316">
                McCormick Place - Chicago, IL
              </option>

              <option value="105812">
                McDonalds Hyatt Lodge - Oak Brook, IL
              </option>

              <option value="106432">
                Merchandise Mart - Chicago, IL
              </option>

              <option value="106731">
                Meridian Banquets - Rolling Meadows, IL
              </option>

              <option value="103974">
                Meridian Banquets - Rolling Meadows, IL
              </option>

              <option value="104017">
                Meson Sabika - Naperville, IL
              </option>

              <option value="106649">
                Michigan Shores Country Club - Wilmette, IL
              </option>

              <option value="105829">
                Minooka Community High School - Channahon, IL
              </option>

              <option value="106004">
                Mirage Four Points - Schiller Park, IL
              </option>

              <option value="104043">
                Monty's Banquets - Bensenville, IL
              </option>

              <option value="104579">
                Morton Arboretum - Lisle, IL
              </option>

              <option value="106038">
                Mystic Blue-Navy Pier - Chicago, IL
              </option>

              <option value="106947">
                Naperville North High School - ,
              </option>

              <option value="106714">
                Naperville North High School - ,
              </option>

              <option value="105841">
                New Grachanitsa Serbian Monastery - Third Lake, IL
              </option>

              <option value="104581">
                Niko's Restaurant - Bridgeview, IL
              </option>

              <option value="106445">
                Normandy Room (American Legion) - Elmhurst, IL
              </option>

              <option value="106310">
                Northmoor Country Club - Highland Park, IL
              </option>

              <option value="106537">
                Odyssey Boat (Navy Pier) - Chicago, IL
              </option>

              <option value="104018">
                Palos Country Club - Orland Park, IL
              </option>

              <option value="105805">
                Patrick Haley Mansion - Joliet, IL
              </option>

              <option value="104089">
                Peggy Notebaert Nature Museum - Chicago, IL
              </option>

              <option value="106386">
                Porretta's Elegant Banquets - Chicago, IL
              </option>

              <option value="105804">
                Prairie Street Brew House - Rockford, IL
              </option>

              <option value="106474">
                Quay Chicago - ,
              </option>

              <option value="105810">
                Randall Oaks Golf Club - West Dundee, IL
              </option>

              <option value="105881">
                Ravinia - Highland Park, IL
              </option>

              <option value="106836">
                Ravinia Green Country Club - Riverwoods, IL
              </option>

              <option value="106942">
                Renaissance Hotel - Northbrook, IL
              </option>

              <option value="106918">
                Rockit Bar and Grill - Chicago, IL
              </option>

              <option value="104267">
                Royal Palace Banquets - Chicago Ridge, IL
              </option>

              <option value="105933">
                Saint Viator High School - Arlington Heights, IL
              </option>

              <option value="106079">
                Sarah Lee Corporation - Downers Grove, IL
              </option>

              <option value="106168">
                School of the Art Institute of Chicago - Chicago,
              </option>

              <option value="105825">
                Seville Banquets - Streamwood, IL
              </option>

              <option value="105970">
                Sheely Center for the Performing Arts - Northbrook, IL
              </option>

              <option value="106761">
                Shelle Jewelers - Northbrook, IL
              </option>

              <option value="106917">
                Shops at Northbridge - Chicago, IL
              </option>

              <option value="106151">
                Shoreline Cruises - Chicago, IL
              </option>

              <option value="105846">
                Silver Lake Country Club - Orland Park, IL
              </option>

              <option value="106208">
                Society Art Gallery - Chicago, IL
              </option>

              <option value="106890">
                Soho House Chicago - Chicago, IL
              </option>

              <option value="106808">
                South Tiffany Garden (Grant Park) - , IL
              </option>

              <option value="105822">
                Space - Evanston, IL
              </option>

              <option value="105836">
                Spirit of Chicago - Chicago, IL
              </option>

              <option value="104263">
                St. Andrews Golf and Country Club - West Chicago, IL
              </option>

              <option value="106976">
                St. Colette - Rolling Meadows, IL
              </option>

              <option value="105833">
                Taft High School - Chicago, IL
              </option>

              <option value="103766">
                TBD - ,
              </option>

              <option value="106919">
                Temple Jeremiah - Northfield, IL
              </option>

              <option value="105857">
                Texas De Brazil - Chicago, IL
              </option>

              <option value="106858">
                The Arches Banquets - ,
              </option>

              <option value="106552">
                The Grand Geneva - Lake Geneva, IL
              </option>

              <option value="105925">
                The Museum of Science and Industry - Chicago, IL
              </option>

              <option value="106187">
                The Sach's Center - Deerfield, IL 60015, IL
              </option>

              <option value="106931">
                Thornton Fractional South - Lansing, IL
              </option>

              <option value="106239">
                Tinley Park Convention Center - Tinley Park, IL
              </option>

              <option value="106572">
                Trump Hotel - ,
              </option>

              <option value="106219">
                Twin Orchard Country Club - Long Grove, IL
              </option>

              <option value="106753">
                Union Station - Chicago,
              </option>

              <option value="106214">
                Union Station - Chicago, IL
              </option>

              <option value="106248">
                Valley Lo Country Club - Glenview, IL
              </option>

              <option value="106359">
                Value City Furniture - Streamwood, IL
              </option>

              <option value="104577">
                Venuti's - Addison, IL
              </option>

              <option value="104260">
                Victoria Beau Jolie - Shiller Park, IL
              </option>

              <option value="104268">
                Villa Nova Banquets - Villa Park, IL
              </option>

              <option value="105802">
                Wentz Concert Hall - Naperville, IL
              </option>

              <option value="106124">
                Westin O'hare - Rosemone, IL
              </option>

              <option value="105803">
                Westin-Itasca - Itasca, IL
              </option>

              <option value="104584">
                Westin-Lombard - Lombard, IL
              </option>

              <option value="105828">
                Wheeling High School - Wheeling, IL
              </option>

              <option value="106041">
                William Tell Restaurant and Banquets - Countryside, IL
              </option>

              <option value="105813">
                Woodbine Golf Course - Homer Glen, IL
              </option>

              <option value="104036">
                WR - Inverness, IL
              </option>

              <option value="105931">
                York High School - Elmhurst, IL
              </option>
            </select>
          </div>
          <div class="form-control-wrapper">
            <input type="text" name='event_location_name' class="form-control" size="30" maxlength="50" placeholder="Event Venue (if not listed above)" />
          </div>
          <div class="form-control-wrapper">
            <p style="margin-bottom:0px;">Services Interested In: </p>
            <div class="row">
              <div class="col-md-6">
                <div class="checkbox">
                  <label>
                    <input type="checkbox" name='question_1' value='DJ'> DJ
                  </label>
                </div> 
                <div class="checkbox">
                  <label>
                    <input type="checkbox" name='question_1' value='Lighting and Decor'> Lighting and Decor
                  </label>
                </div>                 
              </div>
              <div class="col-md-6">
                <div class="checkbox">
                  <label>
                    <input type="checkbox" name='question_1' value='Photobooth'> Photobooth
                  </label>
                </div> 
                <div class="checkbox">
                  <label>
                    <input type="checkbox" name='question_1' value=' Instagram Printing'> Instagram Printing
                  </label>
                </div>                  
              </div>
            </div>

                                            
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-control-wrapper">
            <input type="text" name='first_name' class="form-control" size="30" maxlength="50" placeholder="First Name" />
          </div>
          <div class="form-control-wrapper">
            <input type="text" name='last_name' class="form-control" size="30" maxlength="50" placeholder="Last Name" />
          </div>
          <div class="form-control-wrapper">
            <input type="text" name='email' class="form-control" size="30" maxlength="75" placeholder="Email" />
          </div>
          <div class="form-control-wrapper">
            <input type="text" name='telephone' class="form-control" size="30" maxlength="30" placeholder="Phone" />
          </div>  
          <div class="form-control-wrapper">
            <input type="text" class="form-control" name="req_source" size="30" maxlength="50" placeholder="How did you hear about us?"/>
          </div> 
          <div class="form-control-wrapper">
            <textarea name="additional_information" class="form-control" rows="5" cols="25" placeholder="Additional Questions Or Event Details"></textarea>
          </div>                 
        </div>
              
      </div>









      <input type="hidden" name=
      "checkdate" value='' /><input type="hidden" name="djidnumber" value=
      "7638" /><input type="hidden" name="action" value=
      "add_information_request" /><input type="hidden" name="source" value='' />
      
      <div class="text-center">
        <input type="submit" name="submit" value="Submit" class="btn btn-cta btn-sm"/>
      </div>



    </form><!-- END DJEVENTPLANNER CODE -->
  </div>
</div> 
<?php get_footer() ?>



<!-- BEGIN DJEVENTPLANNER CODE -->



