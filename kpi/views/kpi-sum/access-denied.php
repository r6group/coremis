<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 10/28/2016 AD
 * Time: 18:16
 */
use yii\helpers\Url;

$this->title = 'Access Denied.';
?>

<div class="wrapper full-page-wrapper page-error text-center">
    <div class="inner-page">
        <h1>
				<span class="clearfix title">
					<span class="number">( @ o)</span> <span class="text">Oops! <br/>Sorry.</span>
				</span>
        </h1>
        <p>ขออภัย. คุณไม่ได้รับสิทธิ์ในการเข้าถึงส่วนนี้, please <a href="<?=Url::toRoute(['site/contact'])?>">contact us</a> to report this issue.</p>
        <p>You can also use search form below to find the page you are looking for.</p>
        <form class="searchbox center-block">
            <div class="input-group input-group-lg">
                <input type="search" placeholder="type keyword here" class="form-control">
					<span class="input-group-btn">
						<button class="btn btn-primary" type="button"><i class="fa fa-search"></i> Search</button>
					</span>
            </div>
        </form>
        <div>
            <a href="javascript:history.go(-1)" class="btn btn-custom-primary"><i class="fa fa-arrow-left"></i> Go Back</a>
            <a href="<?=Url::toRoute(['site/index'])?>" class="btn btn-primary"><i class="fa fa-home"></i> Home</a>
        </div>
    </div>
</div>
