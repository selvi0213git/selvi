<!-- 
[init]   
[20170727] | RENEWAL - Kboard qa-custom create     | eley
--------------------------------------------------------------
[after]
[20170802] | RENEWAL - comments create             | eley
-->
<!-- yeonok: kboard qna 시작 -->
<section class="event-board qna">
	<!-- Text -->
	<h3 class="kboard-section-hd">Q&amp;A</h3>
	<!-- Board start -->
	<div class="kboard-selvi">

		<!-- List Header Setting start ------------------------------------------------------------------------->
		
		<!-- List header -->
		<div class="kboard-list-header">
			
			<!-- Category right -->
			<div class="kboard-right">
				<?php if($board->use_category == 'yes'):?>
				<div class="kboard-category category-pc">
					<form id="kboard-category-form-<?php echo $board->id?>-pc" method="get" action="<?php echo $url->toString()?>">
						<?php echo $url->set('pageid', '1')->set('category1', '')->set('category2', '')->set('target', '')->set('keyword', '')->set('mod', 'list')->toInput()?>
						
						<?php if($board->initCategory1()):?>
							<select name="category1" onchange="jQuery('#kboard-category-form-<?php echo $board->id?>-pc').submit();">
								<option value=""><?php echo __('All', 'kboard')?></option>
								<?php while($board->hasNextCategory()):?>
								<option value="<?php echo $board->currentCategory()?>"<?php if(kboard_category1() == $board->currentCategory()):?> selected<?php endif?>><?php echo $board->currentCategory()?></option>
								<?php endwhile?>
							</select>
						<?php endif?>
						
						<?php if($board->initCategory2()):?>
							<select name="category2" onchange="jQuery('#kboard-category-form-<?php echo $board->id?>-pc').submit();">
								<option value=""><?php echo __('All', 'kboard')?></option>
								<?php while($board->hasNextCategory()):?>
								<option value="<?php echo $board->currentCategory()?>"<?php if(kboard_category2() == $board->currentCategory()):?> selected<?php endif?>><?php echo $board->currentCategory()?></option>
								<?php endwhile?>
							</select>
						<?php endif?>
					</form>
				</div>
				<?php endif?>
			</div>
		</div><!--/.kboard-list-header-->
		
		<!-- Category right mobile -->
		<?php if($board->use_category == 'yes'):?>
		<div class="kboard-category category-mobile">
			<form id="kboard-category-form-<?php echo $board->id?>-mobile" method="get" action="<?php echo $url->toString()?>">
				<?php echo $url->set('pageid', '1')->set('category1', '')->set('category2', '')->set('target', '')->set('keyword', '')->set('mod', 'list')->toInput()?>
				
				<?php if($board->initCategory1()):?>
					<select name="category1" onchange="jQuery('#kboard-category-form-<?php echo $board->id?>-mobile').submit();">
						<option value=""><?php echo __('All', 'kboard')?></option>
						<?php while($board->hasNextCategory()):?>
						<option value="<?php echo $board->currentCategory()?>"<?php if(kboard_category1() == $board->currentCategory()):?> selected<?php endif?>><?php echo $board->currentCategory()?></option>
						<?php endwhile?>
					</select>
				<?php endif?>
				
				<?php if($board->initCategory2()):?>
					<select name="category2" onchange="jQuery('#kboard-category-form-<?php echo $board->id?>-mobile').submit();">
						<option value=""><?php echo __('All', 'kboard')?></option>
						<?php while($board->hasNextCategory()):?>
						<option value="<?php echo $board->currentCategory()?>"<?php if(kboard_category2() == $board->currentCategory()):?> selected<?php endif?>><?php echo $board->currentCategory()?></option>
						<?php endwhile?>
					</select>
				<?php endif?>
			</form>
		</div>
		<?php endif?>
		
		<!-- List Header Setting end --------------------------------------------------------------------------->
		
		<!-- List setting -->
		<?php if($board->use_category == 'yes'):?>
		<div class="kboard-category category-mobile">
			<form id="kboard-category-form-<?php echo $board->id?>-mobile" method="get" action="<?php echo $url->toString()?>">
				<?php echo $url->set('pageid', '1')->set('category1', '')->set('category2', '')->set('target', '')->set('keyword', '')->set('mod', 'list')->toInput()?>
				
				<?php if($board->initCategory1()):?>
					<select name="category1" onchange="jQuery('#kboard-category-form-<?php echo $board->id?>-mobile').submit();">
						<option value=""><?php echo __('All', 'kboard')?></option>
						<?php while($board->hasNextCategory()):?>
						<option value="<?php echo $board->currentCategory()?>"<?php if(kboard_category1() == $board->currentCategory()):?> selected<?php endif?>><?php echo $board->currentCategory()?></option>
						<?php endwhile?>
					</select>
				<?php endif?>
				
				<?php if($board->initCategory2()):?>
					<select name="category2" onchange="jQuery('#kboard-category-form-<?php echo $board->id?>-mobile').submit();">
						<option value=""><?php echo __('All', 'kboard')?></option>
						<?php while($board->hasNextCategory()):?>
						<option value="<?php echo $board->currentCategory()?>"<?php if(kboard_category2() == $board->currentCategory()):?> selected<?php endif?>><?php echo $board->currentCategory()?></option>
						<?php endwhile?>
					</select>
				<?php endif?>
			</form>
		</div>
		<?php endif?>

		<!-- QA List -->
		<div class="kboard-list">
			<table>
			
				<!-- Head Menu -->
				<thead>
					<tr>
						<td class="kboard-list-uid">No.</td>
						<td class="kboard-list-title">제목</td>
						<td class="kboard-list-status">상태</td>
						<td class="kboard-list-user">작성자</td>
						<td class="kboard-list-date">등록일</td>
					</tr>
				</thead>
				
				
				<!-- Item List start -->
				<tbody>
				<?php while($content = $list->hasNextNotice()):?>
				<!-- Q&A list -->
					<tr class="<?php if($content->uid == kboard_uid()):?> kboard-list-selected<?php endif?>">
						<!-- No -->
						<td class="kboard-list-uid"><?php echo __('Notice', 'kboard')?></td>
				
						<!-- title & view -->
						<td class="kboard-list-title">
							<a href="#">
								<!-- title -->
								<?php if($board->use_category == 'yes' && $board->initCategory1()):?>
									<span class="kboard-mobile-category"><?php if($content->category1):?>[<?php echo $content->category1?>]<?php endif?></span>
								<?php endif?>
								
								<?php echo $content->title?>
								<span class="kboard-comments-count"><?php echo $content->getCommentsCount()?></span>
								
								<!-- content view -->
								<div class="content-view">
									<!-- att & thumbnail -->
									<?php foreach($content->attach as $key=>$attach): $extension = strtolower(pathinfo($attach[0], PATHINFO_EXTENSION));?>
										<?php if(in_array($extension, array('gif','jpg','jpeg','png'))):?>
											<p class="thumbnail-area"><img src="<?php echo site_url($attach[0])?>" alt="<?php echo $attach[1]?>"></p>
										<?php else: $download[$key] = $attach; endif?>
									<?php endforeach?>
									
									<!-- content -->
									<?php echo nl2br($content->content)?>
								</div>
								
								<!-- mobile status view-->
								<div class="kboard-mobile-status">
									<?php if($content->category2 == '답변대기'):?><span class="kboard-selvi-status-wait">답변대기</span><?php endif?>
									<?php if($content->category2 == '답변완료'):?><span class="kboard-selvi-status-complete">답변완료</span><?php endif?>
								</div>
								
								<!-- mobile contents view-->
								<div class="kboard-mobile-contents">
									<span class="contents-item"><?php echo $content->member_display?></span>
									<span class="contents-separator">|</span>
									<span class="contents-item"><?php echo date("Y-m-d", strtotime($content->date))?></span>
								</div>
							</a>
						</td>
						
						<!-- status -->
						<td class="kboard-list-status">
							<?php if($content->category2 == '답변대기'):?><span class="kboard-selvi-status-wait">답변대기</span><?php endif?>
							<?php if($content->category2 == '답변완료'):?><span class="kboard-selvi-status-complete">답변완료</span><?php endif?>
						</td>
						
						<!-- user -->
						<!-- +작성자 글자끝 *표시 -->
						<td class="kboard-list-user">
							<?php
							$m_display = mb_substr($content->member_display, '0', -1) . "*";
							echo $m_display;
							?>
						</td>
						
						<!-- date -->
						<td class="kboard-list-date"><?php echo date("Y-m-d", strtotime($content->date))?></td>
					</tr>
					
					<!-- Reply list -->
					<?php if($content->category2 == '답변완료'):?>
						<!-- 댓글내역 보여줌 tr포함 -->
					<?php $boardBuilder->builderReply($content->uid)?>
				<?php endif ?>
				<?php endwhile?>
				
				<?php while($content = $list->hasNext()):?>
				<!-- Q&A list -->
					<tr class="<?php if($content->uid == kboard_uid()):?> kboard-list-selected<?php endif?>">
						<!-- No -->
						<td class="kboard-list-uid"><?php echo $list->index()?></td>
				
						<!-- title & view -->
						<td class="kboard-list-title">
							<a href="#">
								<!-- title -->
								<?php if($board->use_category == 'yes' && $board->initCategory1()):?>
									<span class="kboard-mobile-category"><?php if($content->category1):?>[<?php echo $content->category1?>]<?php endif?></span>
								<?php endif?>
								
								<?php echo $content->title?>
								<span class="kboard-comments-count"><?php echo $content->getCommentsCount()?></span>
								
								<!-- content view -->
								<div class="content-view">
									<!-- att & thumbnail -->
									<?php foreach($content->attach as $key=>$attach): $extension = strtolower(pathinfo($attach[0], PATHINFO_EXTENSION));?>
										<?php if(in_array($extension, array('gif','jpg','jpeg','png'))):?>
											<p class="thumbnail-area"><img src="<?php echo site_url($attach[0])?>" alt="<?php echo $attach[1]?>"></p>
										<?php else: $download[$key] = $attach; endif?>
									<?php endforeach?>
									
									<!-- content -->
									<?php echo nl2br($content->content)?>
									
									<!-- ADMIN SET -->
									<?php if($board->isAdmin()):?>
									<br>
									<input type="button" value="관리" class="kboard-ask-one-button-gray" style="width:100%;" onclick="<?php if($board->isWriter() && !$content->notice):?>location.href='<?php echo $url->set('uid', $content->uid)->set('mod', 'editor')->toString()?>'<?php endif?>">
									<?php endif ?>
								</div>
								
								<!-- mobile status view-->
								<div class="kboard-mobile-status">
										<?php if($content->category2 == '답변대기'):?><span class="kboard-selvi-status-wait">답변대기</span><?php endif?>
										<?php if($content->category2 == '답변완료'):?><span class="kboard-selvi-status-complete">답변완료</span><?php endif?>
								</div>
								
								<!-- mobile contents view-->
								<div class="kboard-mobile-contents">
									<span class="contents-item"><?php echo $content->member_display?></span>
									<span class="contents-separator">|</span>
									<span class="contents-item"><?php echo date("Y-m-d", strtotime($content->date))?></span>
								</div>
							</a>
						</td>
						
						<!-- status -->
						<td class="kboard-list-status">
							<?php if($content->category2 == '답변대기'):?><span class="kboard-selvi-status-wait">답변대기</span><?php endif?>
							<?php if($content->category2 == '답변완료'):?><span class="kboard-selvi-status-complete">답변완료</span><?php endif?>
						</td>
						
						<!-- user -->
						<!-- +작성자 글자끝 *표시 -->
						<td class="kboard-list-user">
							<?php
							$m_display = mb_substr($content->member_display, '0', -1) . "*";
							echo $m_display;
							?>
						</td>
						
						<!-- date -->
						<td class="kboard-list-date"><?php echo date("Y-m-d", strtotime($content->date))?></td>
					</tr>
					
					<!-- Reply list -->
					<?php if($content->category2 == '답변완료'):?>
					
					<!-- 댓글내역 보여줌 tr포함 -->
					<?php $boardBuilder->builderReply($content->uid)?>
					
					<?php endif ?>
					<?php endwhile?>
				</tbody>
			</table>
		</div>
		<!-- Item List end -->
		
		<!-- Pageing -->
		<div class="kboard-pagination">
			<ul class="kboard-pagination-pages">
				<?php echo kboard_pagination($list->page, $list->total, $list->rpp)?>
			</ul>
		</div>
					
		<!-- Login controller start -->
		<?php if($board->isWriter()):?>

		<!-- Login check -->
		<?php 
			//현재 유저 정보를 가져옴
			global $current_user;
			wp_get_current_user();
			$user_id = $current_user->ID;
			
			//로그인 유저가 아닐때 빈값줌
			if(is_null($user_id)){
				$user_id = "";
			}	
		?>
		
		<!-- function : login check & link login page -->
		<script>
			function kboard_logchk() {
				var user = <?php echo $user_id?>;
				if(!user){
					//유저가 아닐때 로그인으로 이동
					if(confirm("로그인이 필요한 서비스입니다.\n로그인하시겠습니까?")){
						//iframe사용으로 인한 부모창으로url이동
						parent.change_parent_url("http://selvitest.cafe24.com/login/");
						}
						
				//유저일때 글쓰기로 이동
				} else {
					location.href = "<?php echo $url->set('mod', 'editor')->toString()?>";
				}
			}
		</script>

		<!-- Button write -->
		<div class="kboard-control">
			<a href="javascript:kboard_logchk();" class="kboard-selvi-button-small"><?php echo __('New', 'kboard')?></a>
		</div>
		
		<?php endif?>
		<!-- Login controller end -->
		
	</div><!-- /.kboard-selvi -->
</section><!-- /.event-board qna -->
<!-- yeonok: kboard qna 끝 -->

<script type="text/javascript" src="<?php echo $skin_path?>/script.js"></script>