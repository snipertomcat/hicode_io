<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<?php
//include('header.php');

ini_set('display_errors', 1);

//$trackId = ;
//$url = "https://www.udemy.com/api-2.0/courses/".$trackId."/?fields[course]=title,headline,description,image_480x270,rating,price,url,visible_instructors,created,avg_rating,is_paid,is_private,num_reviews,status_label,image_200_H";
$url = 'https://www.udemy.com/api-2.0/courses?search=programming&price=price-free';

$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL,$url);

$clientID = 'ULLcEQDvs63nOWnFTW0uGKAGrrtlhDV4Hs9gDIQH';
$clientSecret = '2f2tNHwzH3hn8ygDrtLhsGpg1fehrpAeIayLDnKn6L8PzARXBQ5ygsHimIPjfZpscXMQF12QIZxMtLcDw1Dtd5csQBYkOyx1w8nqvr5RDgzSe8C63PnKAMCFPcWMLpGe';

//    $clientID = '1T69TiUXm5gEVciaGGZUrEkz9oSV6BOK33PTt952'; //$json['affsetting']['udy_client_id'];
//    $clientSecret = '2F3uFtJE7olM3hHnXSpx0n3TOqKDzLUQJODTgUeB6vmSiAKDLOJTVXFkWZaVSMxIVAv5U8sToaWBSyIso0MGN1NH8nCDRWdzeSbTNEm6qVP4FbyCyGkrfiQS4eXEywDa'; //$json['affsetting']['udy_secret_id'];

// $clientID = '1T69TiUXm5gEVciaGGZUrEkz9oSV6BOK33PTt952'; //$json['affsetting']['udy_client_id'];
// $clientSecret = '2F3uFtJE7olM3hHnXSpx0n3TOqKDzLUQJODTgUeB6vmSiAKDLOJTVXFkWZaVSMxIVAv5U8sToaWBSyIso0MGN1NH8nCDRWdzeSbTNEm6qVP4FbyCyGkrfiQS4eXEywDa'; //$json['affsetting']['udy_secret_id'];
// $clientID = $json['affsetting']['udy_client_id'];
// $clientSecret = $json['affsetting']['udy_secret_id'];

$headers = array(
    'Content-Type: application/json',
    'Authorization: Basic '. base64_encode("$clientID:$clientSecret")
);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLINFO_HEADER_OUT, true);
$result=curl_exec($ch);
$results = json_decode($result);
//echo "<pre>". print_r($results);die;

?>
<?php foreach ($results->results as $item) { ?>
    <div class="card" style="width: 18rem;">
        <?php //print_r($item); ?>
        <img src="<?php echo $item->image_240x135 ?>" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title"><?php $item->title ?></h5>
            <p class="card-text"><?php $item->headline ?></p>
            <a href="#" class="btn btn-primary">							<a href="https://www.udemy.com<?php echo $buyurl;?>" class="btn_1 full-width" target="_blank">Purchase</a>
            </a>
        </div>
    </div>

<?php     } ?>


<?php


// advertiement
include('advertiement.php');
// footer
?>


<?php
//include('footer.php');
?>
<?php
if ($json['affsetting']['substype'] == 'no') {
    // code...

    ?>
    <div class="modal" tabindex="-1" role="dialog" id="subscribe_modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background:#57488A;">
                    <h5 class="modal-title" style="color:white;">Sign Up For Newsletter</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="data.php" method="POST">
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-sm-12 col-sm-offset-6 col-xs-6 col-xs-offset-6">


                                <div class="form-group">

                                    <input name="email" type="email" class="form-control input-lg" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your email here">

                                </div>
                                <input type="hidden" name="webid" value="<?php echo $json['frontend']['id'];?>">
                                <input type="hidden" name="uid" value="<?php echo $json['frontend']['uid'];?>">



                            </div>
                            <div class="col-sm-12 col-sm-offset-6 col-xs-6 col-xs-offset-6">
                                <small class=" text-muted"><strong>Privacy Policy:</strong> We hate SPAM and promise to keep your email address safe.</small>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer"  style="background:#57488A;color:white;">
                        <button type="submit" id="submitApprove" class="btn btn-success btn-block btn-lg" >Subscribe</button>

                        <!--<button type="button" class="btn btn-primary">Save changes</button>-->
                        <!--<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">

        window.addEventListener('load', function(event) {
            if (typeof sessionStorage['dljbOptin'] == 'undefined') {
                setTimeout(dljbShowOptin, 3000);
            }
        });


        function dljbShowOptin() {
            $("#subscribe_modal").modal();
            sessionStorage['dljbOptin'] = 'shown';
        }


    </script>
<?php } ?>

