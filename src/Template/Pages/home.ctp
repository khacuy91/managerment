<?php $session = $this->request->session(); 

    $lang = $session->read('language');

?>

<!DOCTYPE html>

<html>

<head>

    <title>Selfwing</title>

    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />

    <meta name="description" content="mô tả website" />

    <meta name="keywords" content="những từ khóa của website bạn" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="icon" href="img/front/favicon.ico" type="image/x-icon" />

    <link rel="stylesheet" href="<?php echo $this->request->webroot?>css/bootstrap.min.css" type="text/css" media="screen" />

    <link rel="stylesheet" href="<?php echo $this->request->webroot?>css/bootstrap-theme.min.css" type="text/css" media="screen" />   

    <link rel="stylesheet" href="<?php echo $this->request->webroot?>css/datepicker.css" type="text/css" media="screen" />

    <link rel="stylesheet" href="<?php echo $this->request->webroot?>css/swiper.min.css" type="text/css" media="screen" />   

    <link rel="stylesheet" href="<?php echo $this->request->webroot?>css/jquery.mmenu.all.css" type="text/css" media="screen" />

    <link rel="stylesheet" href="<?php echo $this->request->webroot?>css/hover.css" type="text/css" media="screen" />

    <link rel="stylesheet" href="<?php echo $this->request->webroot?>css/jquery.fancybox.css" type="text/css" media="screen" />

    <link rel="stylesheet" href="<?php echo $this->request->webroot?>css/common.css" type="text/css" media="screen" />      

    <link href='https://fonts.googleapis.com/css?family=Roboto:400,700,900,300,500' rel='stylesheet' type='text/css'>

 

    

</head>



    <style>

 

     img{
	height:auto;
	max-width:100%;
	vertical-align: middle;
     }

 

  	.block-img-news{

		max-width :400px;

		max-height: 180px;

	}

	.block-news-content{

        max-width: 371px;

        height: 115px;

    }

.block-img{

	max-width :380px;

	max-height:180px;

} 

div.content-info.color-2{

	height :9em;

}

div.content-info.color-1{

	height :9em;

}

div.content-info.color-3{

	height :9em;

}
    </style>

 

<body> 

   <?php echo $this->element('header'); ?>

        <div id="wd-content-container"> 

            <div class="pt-img-banner">

                <div class="swiper-container swiper-container-02">

                    <div class="swiper-wrapper">

                        <?php foreach ($bannerAll as $key => $value) : ?>

                        <div class="swiper-slide">   

                            <img src="<?php echo $this->request->webroot?>images/banners/<?php echo $value->banner ?>" class = "banner" alt="banner"/>              

                            </div>

                         <?php endforeach; ?> 

                    </div>

					

                    <div class="swiper-button-next swiper-button-next-001"><img src="<?php echo $this->request->webroot?>images/icon-002.png"></div>

                    <div class="swiper-button-prev swiper-button-prev-001"><img src="<?php echo $this->request->webroot?>images/icon-001.png"></div>

                </div>

			

                <div class="block-info">

                    <div class="container">

                        <div class="row">

                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">

                                <div class="content-info color-1">

                                    <h3><?php echo __('connect'); ?></br></h3>

                       <?php echo $this->Html->link( __('view.detail'),array('controller'=>'ServicesType','action'=>'detail',1)) ?>

                                </div>

                                

                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">

                                <div class="content-info color-2">

                                     <h3><?php echo __('people'); ?></br></h3>

                              <?php echo $this->Html->link( __('view.detail'),array('controller'=>'ServicesType','action'=>'detail',2)) ?>

                                </div>

                                

                            </div>



                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">

                                <div class="content-info color-3">

                                       <h3><?php echo __('work.japan'); ?></br></h3>

                                <?php echo $this->Html->link( __('view.detail'),array('controller'=>'ServicesType','action'=>'detail',3)) ?>

                                </div>

                                

                            </div>

                        </div>

                    </div>

                </div>

            

            </div>

           

            <div class="block-news-list">

                <div class="container">

                    <h3 class="title-page">

                        <?php echo __('news.event');?>

                        <?php echo $this->Html->link( __('view.detail'),'/tin-tuc-su-kien'); ?>

                    </h3>

                    <div class="row mt-26">

                         <?php if($lang == "vi_VN") {?>

                         <?php foreach ($newAll as $key => $value):  ?>

                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">



                            <div class="block-news">

                                <a href="#" class="block-img">

                                    <img src="<?php echo $this->request->image?>images/news/<?php echo $value->image ?>" alt="banner"/>

                                </a>

                                <div class="block-news-content">

                                   <h3><?php echo $this->Html->link($value->title,array('controller'=>'news','action'=>'news_detail',$value->slug)); ?> </h3>									 



                                    <span class="times"><?php echo $value->created->format('Y-m-d'); ?></span>

                                </div>

                            </div>

                        </div>

                        <?php endforeach ; ?>

                    <?php } else {?> 

                     <?php foreach ($newAll as $key => $value):  ?>          

                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">



                            <div class="block-news">

                                <a href="#" class="block-img">

                                    <img src="<?php echo $this->request->image?>images/news/<?php echo $value->image ?>"  alt="banner"/>

                                </a>

                                <div class="block-news-content">

                       <h3><?php echo $this->Html->link($value->title_jp,array('controller'=>'news','action'=>'news_detail',$value->slug)); ?> </h3>									 



                                    <span class="times"><?php echo $value->created->format('Y-m-d'); ?></span>

                                </div>

                            </div>

                         </div>

                     <?php endforeach; ?>    

                    <?php }?>

                </div>

            </div>

            <div class="container">

                <div class="row mt-26">

                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">

                        <h3 class="title-page">

                            <?php echo __('job');?>

                   <?php echo $this->Html->link( __('view.detail'),'/cam-nang-viec-lam'); ?>

                        </h3>

                        <ul class="list-news">

                            <?php if($lang == 'vi_VN'){ ?>

                                <?php foreach ($JobAll as $key => $value) :  ?>

                                <li>

                        <?php echo $this->Html->link($value->title,array('controller'=>'jobs','action'=>'jobs_detail',$value->slug)) ?>

                                    <span class="times"><?php echo $value->created->format('Y-m-d'); ?></span>

                                </li>                     

                               <?php endforeach; ?>     

                            <?php } else {?>

                                <?php foreach ($JobAll as $key => $value) :  ?>

                                <li>

                                  <?php echo $this->Html->link($value->title_jp,array('controller'=>'jobs','action'=>'jobs_detail',$value->slug)) ?>



                                <span class="times"><?php echo $value->created->format('Y-m-d'); ?></span>

                                </li>

                            <?php endforeach; ?>

                            <?php } ?>



                        </ul>

                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">

                        <h3 class="title-page">

                            <?php echo __('video'); ?>

                 <?php echo $this->Html->link( __('video'),'/video') ?>

                        </h3>

                        <ul class="list-video">

                            <?php foreach ($videoAll as $key => $value) : ?>

                                <li>

                                <img src="<?php echo $this->request->webroot?>images/videos/<?php echo $value->image ?>" class="block-img" alt="banner"/>

                               <a href="<?php echo $value->url; ?>" rel="gallery1" title="VIDEO CỦA SELFWING 1" class="hvr-pulse-grow fancybox fancybox.iframe"> </a>



                                </li>

                            <?php endforeach; ?>    

                        </ul>

                    </div>

                </div>

            </div>

        </div>

    </div>


    <?php echo $this->element('footer'); ?>

 

   

</body>

</html>

