<?php
if (!defined('DOKU_INC'))
    die();
require_once 'template.php';
$fluid=true;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $conf['lang'] ?>"
      lang="<?php echo $conf['lang'] ?>" dir="<?php echo $lang['direction'] ?>">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            <?php tpl_pagetitle() ?>
            [<?php echo strip_tags($conf['title']) ?>]
        </title>

        <?php tpl_metaheaders() ?>
        <?php echo tpl_favicon(array('favicon', 'mobile')) ?>
    </head>

    <body>
		<div id="wrap">
        <div id="main" class="container<?php echo $fluid?'-fluid':''?>">
			<div class="navbar navbar-fixed-top">
				<div class="navbar-inner">
					<div class="container<?php echo $fluid?'-fluid':''?>">
						<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</a>
						<a class="brand" href="<?php echo wl() ?>">[<?php echo strip_tags($conf['title']) ?>]</a>
						<div class="nav-collapse">
							<ul class="nav">
								<?php amdy_tpl_link_as_li(wl($ID, 'do=backlink'), tpl_pagetitle($ID, true), 'title="' . $lang['btn_backlink'] . '"') ?>
								<?php amdy_tpl_link_as_li(wl(), $conf['title'], 'name="dokuwiki__top" id="dokuwiki__top" accesskey="h" title="[H]"') ?>
								
							</ul>
							<ul class="nav pull-right">
								<li><?php tpl_action('subscribe',1) ?></li>
								
								<li><?php tpl_action('admin',1) ?></li>
								<li><?php tpl_action('profile',1) ?></li>
								<li><?php tpl_action('login',1) ?></li>
								<li><?php amdy_tpl_searchform() ?></li>
							</ul>
						</div>
						
					</div>
				</div>
			</div>
            <div class="row<?php echo $fluid?'-fluid':''?>">
                <div class="span12">
                    
                    <?php if ($conf['youarehere']) { ?>
                        <div class="row<?php echo $fluid?'-fluid':''?>">
                            <div class="span12">
                                <?php tpl_youarehere() ?>
                            </div>
                        </div>
                    <?php } ?>
					
                    <div class="row<?php echo $fluid?'-fluid':''?>">
                        <div class="span2">
							<div class="sidebar-nav">
								
								<?php
								global $ID;
								$idalt = $ID;
								$html = p_wiki_xhtml('wiki:menu','',false);
								$html = str_replace('<p>','',$html);
								$html = str_replace('</p>','',$html);
								echo $html;
								$ID = $idalt;
								?>
							</div>
						</div>
						<div class="span10">
							<div class="row<?php echo $fluid?'-fluid':''?>">
								<div class="span12">
									<p>
									<?php html_msgarea() ?>
									</p>
								</div>
							</div>
							
							<div class="row<?php echo $fluid?'-fluid':''?>">
								<div class="<?php if(tpl_toc(true)):?>alert alert-info<?php endif; ?> span6">
									<?php tpl_toc()?>&nbsp;
								</div>
									
								<ul class="pull-right nav nav-tabs">
									<?php tpl_action('recent', 1, 'li');?>
									<?php tpl_action('edit', 1, 'li');?>
								</ul>
							</div>
							<!-- wikipage start -->
							<?php tpl_content(false) ?>
							<!-- wikipage stop -->
                        </div>
                    </div>
     
                </div><!--/span-->

            </div>
			<div class="push"></div>
            
        </div>
		</div>
		<div id="footer" class="container<?php echo $fluid?'-fluid':''?>">
			<div class="row<?php echo $fluid?'-fluid':''?>">
				<div class="span12">
					<p class="label pull-right" style="white-space:pre-wrap;"><?php tpl_pageinfo() ?></p>
				</div>
			</div>
			<?php if ($conf['breadcrumbs']) { ?>
			<div class="row<?php echo $fluid?'-fluid':''?>">
				<div class="span12">
					<?php amdy_tpl_breadcrumbs() ?>
				</div>
			</div>
			<?php } ?>
			
			<div class="navbar">
				<div class="navbar-inner">
					<div class="container">
						<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</a>
						<div class="nav-collapse">
							<ul class="nav">
								<li><?php tpl_action('edit',1) ?></li>
								<li><?php tpl_action('history',1) ?></li>
								<li><?php tpl_action('revert',1) ?></li>
								<li><?php tpl_action('recent',1) ?></li>
							</ul>
							<ul class="nav pull-right">
								<li><?php tpl_action('subscribe',1) ?></li>
								<li><?php tpl_action('media',1) ?></li>
								<li><?php tpl_action('admin',1) ?></li>
								<li><?php tpl_action('profile',1) ?></li>
								<li><?php tpl_action('login',1) ?></li>
								<li><?php tpl_action('index',1) ?></li>
								<li><?php tpl_action('top',1) ?></li>
							</ul>
						</div><!-- /.nav-collapse -->
					</div>
				</div><!-- /navbar-inner -->

			</div><!-- /.navbar -->
			<div class="row<?php echo $fluid?'-fluid':''?>">
				<div class="span6" style="color:#ccc">
					<?php tpl_license(false); ?>
				</div>
			</div>
		</div><!-- /footer -->
        <div class="no"><?php /* provide DokuWiki housekeeping, required in all templates */ tpl_indexerWebBug() ?></div>
		<!--
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
		<script src="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.0.3/bootstrap.min.js"></script>
		-->
	</body>
</html>
