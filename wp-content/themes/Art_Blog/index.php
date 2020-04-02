<!DOCTYPE html>
<html lang="en">

<head>
<title>
	<?php
		$name = single_tag_title('', false);
		if ($name) {
			echo $name . "&nbsp;-&nbsp;" . get_bloginfo('description');
		} else {
			echo get_bloginfo('name');
		}
	?>
</title>
<!-- Avoid duplicate inclusion in search engines -->
<link rel="canonical" href="https://www.6969net.cn/" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/swiper.min.css">
<?php require ('common.php'); ?>
</head>

<body>
	<?php get_header(); ?>
	

	<!-- 正文区域start -->
	<section class="continar" id="lazycontainer">
			<!--移动端轮播start-->
			<!--div class="swiper-container1">
				<div class="swiper-wrapper">
					<div class="swiper-slide" style="background:url('/wp-content/themes/Art_Blog/images/banner1.png') no-repeat center top; background-size:100% 100%"><a href="https://www.weipxiu.com/"></a></div>
					<div class="swiper-slide" style="background:url('/wp-content/themes/Art_Blog/images/banner3.png') no-repeat center top; background-size:100% 100%"><a href="https://www.weipxiu.com/"></a></div>
				</div>
				<div class="swiper-pagination"></div>
			</div-->
			<!--移动端轮播end-->
		<div class="continar-left" id="ajax_centent">
			<!-- PC正文3d导航start -->
			
			<!-- PC正文3d导航end -->

			<!-- 今日焦点start -->
			<aside class="continar-left-top">
				<?php
				$args = array(
					'post_password' => '',
					'post_status' => 'publish', // 只选公开的文章.
					//'post__not_in' => array($post->ID),//排除当前文章
					'caller_get_posts' => 1, // 排除置頂文章.
					//'orderby' => 'rand', // 依評論數排序.
					'showposts' => 1 // 设置调用条数
				);
				$query_posts = new WP_Query();
				$query_posts->query($args);
				while ($query_posts->have_posts()) {
					$query_posts->the_post(); ?>
					<h1>
						<a href="<?php the_permalink(); ?>" target="_blank">
							<span>【今日焦点】</span>
							<?php the_title(); ?>
							<img src="<?php bloginfo('template_url'); ?>/images/new.gif" width="26" height="14" alt="24小时内最新" alt="<?php echo get_bloginfo('name'); ?>">
						</a>
					</h1>
					<span>
						<?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 300, "..."); ?>
						
					</span>
				<?php }
			wp_reset_query(); ?>
			</aside>
			<!-- 今日焦点end -->

			<!-- 博客介绍start -->
			<aside class="blog">
				<h3>博客介绍</h3>
				<div class="textwidget">
					<p class="clearfix">
						前端博客: <?php echo get_option('weipxiu_options')['domain']; ?>，我们关注Web前端开发技术，移动前端开发，前端资讯，同时分享前端资源和工具等，期待你的参与，<a rel="nofollow" target="_blank" href="/about">了解更多...</a>
					</p>
					<ul class="social">
						<li class="weixin">
							<a href="javascript:;" target="_blank" rel="nofollow" class="top-tip" title="关注微信"><i class="iconfont icon-weixin"></i>微信: pc0744</a>
						</li>
					</ul>
				</div>
			</aside>
			<!-- 博客介绍end -->

			<!-- 邮件订阅start -->
			<?php
			if (get_option('weipxiu_options')['text_pic'] == 'on') {
					?>
					<div class="inner-box">
						<div class="rssbook">
						<p>《一言》</p>
									<!-- 一言开始 -->
		                            <p id="hitokoto">:D 获取中...</p>
                                    <script>
                                       fetch('https://v1.hitokoto.cn')
                                         .then(function (res){
                                           return res.json();
                                         })
                                         .then(function (data) {
                                           var hitokoto = document.getElementById('hitokoto');
                                           hitokoto.innerText = data.hitokoto; 
                                         })
                                         .catch(function (err) {
                                           console.error(err);
                                         })
                                    </script>
	                            	<!-- 一言结束 -->
						</div>
					</div>
				<?php
			}
			?>
			<!-- 邮件订阅end -->

			<!-- 文章start -->
			<!-- 单独强制限制首页渲染多页渲染多少列表数据 -->
			<!-- <?php /*$posts = query_posts($query_string . '&orderby=date&showposts=12'); ?>
			<?php
			if(have_posts()): while(have_posts()):the_post();*/
						?> -->
				<?php
				if(have_posts()): while(have_posts()):the_post();
				?>
					<article class="text">
						<div class="img-left">
							<a class="read-more" href="<?php the_permalink(); ?>" target="_blank">
								<?php
									if (has_post_thumbnail())
									echo _get_post_thumbnail();
								else
									echo "<img src='". catch_that_image()."'"." alt='".get_the_title()."'>";
								?>
							</a>
						</div>
						<div class="text_right">
							<h2>
								<span>
									<?php the_category() ?><i></i></span>
								<a href="<?php the_permalink(); ?>" target="_blank">
									<?php the_title(); ?></a>
							</h2>
							<?php
									if (has_post_thumbnail())
									echo _get_post_thumbnail();
								else
									echo "<img src='". catch_that_image()."'"." alt='".get_the_title()."'>";
							?>
							<h3>
								<?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 190, "..."); ?>
								<!--文章内容-->
							</h3>
							<a class="read-more read_url" href="<?php the_permalink(); ?>" target="_blank">阅读全文<i class="iconfont icon-jiantou-you-cuxiantiao-fill"></i></a>
							<p class="l">
								<!-- <span>
											<a href="<?php /*the_permalink(); */?> ">
												<i class="">&nbsp;</i><?php /*echo '发表于 '.timeago( get_gmt_from_date(get_the_time('Y-m-d G:i:s')) ); */?>
											</a>
										</span> -->
								<span><i class="iconfont icon-shijian" aria-hidden="true"></i><?php the_time('Y年m月d日') ?></span>
								<span>
									<a href="<?php the_permalink(); ?> ">
										<i class="iconfont icon-liulan"></i><?php echo getPostViews(get_the_ID()); ?>℃
									</a>
								</span>
								<span class="comm">
									<a href="<?php the_permalink(); ?> "><i class="iconfont icon-pinglun2"></i><?php echo number_format_i18n(get_comments_number()); ?>条评论
									</a>
								</span>
								<span class="post-like">
									<a href="javascript:;" data-action="ding" data-id="<?php the_ID(); ?>" class="favorite<?php if (isset($_COOKIE['bigfa_ding_' . $post->ID])) echo ' done'; ?>"><i class="iconfont icon-damuzhi1"></i><span class="count"><?php if (get_post_meta($post->ID, 'bigfa_ding', true)) {echo get_post_meta($post->ID, 'bigfa_ding', true);} else {echo '0';
									} ?></span>喜欢
									</a>
								</span>
								<span class="r"></span>
							</p>
							<?php if (is_sticky()) echo '<em><a href="">顶</a></em>'; ?>
							<!-- <span class="new-icon">NEW</span> -->
						</div>
					</article>
				<?php endwhile;
				else : ?>
				<script>
					layer.ready(function(){
						layer.alert('抱歉，当前分类下没有一篇文章，去后台发布？',{
							skin: 'layui',
							title:"提示",
							closeBtn: 1, //是否展示关闭x按钮
							anim: 4,
							btn: ['确认'],
							yes:function(){
								location.href="/wp-login.php"
							}
						})
						if (localStorage.getItem("off_y") == 1) {
							new Audio(
									'https://tts.baidu.com/text2audio?cuid=baiduid&lan=zh&ctp=1&pdt=311&tex=' + '抱歉，当前分类下没有一篇文章，是否去后台发布？'
							).play();                        
						}
					}); 

				</script>
				<?php endif; ?>
				<?php lingfeng_pagenavi();?><!-- 分页调用 -->
		</div>
		<!-- 左侧区域end -->

		<!-- 右侧区域start -->
		<section class="continar-right">
			<?php get_sidebar($name); ?>
		</section>
		<!-- 右侧区域end -->
	</section>
	<!-- 正文区域end -->

	<!-- 底部悬浮窗start -->
	<?php
			if (get_option('weipxiu_options')['login_reg'] == 'on') {
					?>
					<div class="login_alert">
						<div class="login_alert_close">
								<i class="iconfont icon-guanbi"></i>
						</div>
							<div class="login_alert_box">
								<div>程序世界并不孤单，我们一路同行相伴，注册会员分享你的前端经验，赶紧来试试~
											<a href="/wp-login.php" rel="nofollow">会员登录</a>
											<span>或</span>
											<a href="/wp-login.php?action=register" class="register" rel="nofollow">注册会员</a> 
									</div>
							</div>
					</div>
				<?php
			}
	?>
	<!-- 底部悬浮窗end -->

	<!-- 底部调用start -->
	<?php get_footer() ?>
	<!-- 底部调用end -->
</body>

<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/index_min.js"></script>
<script type="text/javascript">
if(!"<?php bloginfo('template_url'); ?>".includes('wp-content/themes/Art_Blog')){
		layer.alert('Sorry，当前主题安装路径不正确，详情点击确认查看主题使用说明！',{
		skin: 'layui',
		title:"提示",
		closeBtn: 1, //是否展示关闭x按钮
		anim: 4,
		btn: ['确认'],
		yes:function(){
			location.href="https://6969net.cn"
		}
	})
}
//turnEffect（翻转）boomEffect（爆炸）pageEffect（翻页）skewEffect（扭曲）cubeEffect（立方体）

</script>
</html>