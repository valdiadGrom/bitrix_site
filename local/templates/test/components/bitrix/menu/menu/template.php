<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<? if (!empty($arResult)) : ?>
	<div class="col-md-9 col-sm-10 col-xs-12">
		<div class="mobile-menu"></div>
		<nav class="navbar navbar-default">
			<div class="collapse navbar-collapse">
				<ul id="nav" class="nav navbar-nav">
					<?
					foreach ($arResult as $arItem) :
						if ($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1)
							continue;
					?>
						<? if ($arItem["SELECTED"]) : ?>
							<li><a href="<?= $arItem["LINK"] ?>" class="current"><?= $arItem["TEXT"] ?></a></li>
						<? else : ?>
							<li><a href="<?= $arItem["LINK"] ?>"><?= $arItem["TEXT"] ?></a></li>
						<? endif ?>

					<? endforeach ?>

				</ul>
			</div>
		</nav>
	</div>
<? endif ?>


<!-- <div class="col-md-9 col-sm-10 col-xs-12">
                        <div class="mobile-menu"></div>
                        <nav class="navbar navbar-default">
                            <div class="collapse navbar-collapse">
                                <ul id="nav" class="nav navbar-nav">
                                    <li class="current"><a href="#slider">Welcome</a></li>
                                    <li><a href="#about">About Me</a></li>
                                    <li><a href="#service">My Service</a></li>
                                    <li><a href="#skill">Skill</a></li>
                                    <li><a href="#story">Story</a></li>
                                    <li><a href="#latest-works">Portfolio</a></li>
                                    <li><a href="#blog">Blog</a></li>
                                    <li><a href="#contact">Contact</a></li>
                                </ul>
                            </div>
                        </nav>
                    </div> -->