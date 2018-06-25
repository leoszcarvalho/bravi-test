<?php  get_header();  ?>



    <section class="row">
      <div class="small-12 columns text-center">
        <div class="leader">

            <p>
            <?php 

            $city = $_POST['city'];
            $country = $_POST['country'];
            $temperature = "";

            if (!empty($city) && !empty($country)) {

              // Get cURL resource
              $curl = curl_init();
              // Set some options - we are passing in a useragent too here
              curl_setopt_array($curl, array(
                  CURLOPT_RETURNTRANSFER => 1,
                  CURLOPT_URL => 'http://api.openweathermap.org/data/2.5/weather?q=' . $city . ',' . $country . '&appid=c83daa17a5efaa902a45146018f04c21',
                  CURLOPT_USERAGENT => 'Api Request'
              ));
              // Send the request & save response to $resp
              $resp = json_decode(curl_exec($curl));
              // Close request to clear up some resources
              curl_close($curl);

              if (isset($resp->main->temp)) {

                $temperature = [
                  "temp" => $resp->main->temp,
                  "temp_min" => $resp->main->temp_min,
                  "temp_max" => $resp->main->temp_max,
                ];

              }else{

                $temperature = [
                  "error" => "Couldn't find results with the data that has been sended",
                ];

              }



              //print_r($resp);

            }

            $data = [
              "the_message" => "Wordpress Weather",
              "city" => $city,
              "country" => $country,
              "temperature" => $temperature,
            ];

            Timber::render( 'welcome.twig', $data );



            ?>
              
            </p>        



        </div>
      </div>
    </section>


<?php  get_footer();  ?>
