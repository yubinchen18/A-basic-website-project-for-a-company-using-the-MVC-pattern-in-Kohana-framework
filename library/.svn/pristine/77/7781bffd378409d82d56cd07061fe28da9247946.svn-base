<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	
	<!-- start / logo -->
	<div class="navbar-header">
		
		<a type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</a>
		<a href="<?php echo URL::to('Start') ?>">
			<img src="<?php echo URL::get('library').'style/backend/img/logo.png'?>" width="50" height ="50"/>
		</a>
	</div>

	<div class="collapse navbar-collapse navbar-collapse">
		<ul class="nav navbar-nav">
			<!-- sections -->
			<?php foreach($sections as $section => $modules): ?>
				<li class="dropdown<?php echo $section === $active ? ' active' : ''; ?>">
					<a href="#" class="dropdown-toggle section" data-toggle="dropdown">
						<?php echo text('section.'.$section); ?>
					</a>
					<ul class="dropdown-menu">
						<?php foreach($modules as $module): ?>
							<li>
								<a href="<?php echo URL::to($module) ?>">
									<?php echo text($module.':module.name');?>
								</a>
							</li>
						<?php endforeach; ?>
					</ul>
				</li>
			<?php endforeach; ?>
		</ul>


		<ul class="nav navbar-nav navbar-right">
			<!-- user options -->
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					<?php echo Identity::instance()->username; ?>
					<b class="caret"></b>
				</a>
				<ul class="dropdown-menu">
					<li>
						<a href="<?php echo URL::to('Settings') ?>"><?php echo text('section.settings') ?></a>
					</li>
					<li>
						<a href="<?php echo URL::to('Auth@logout') ?>"><?php echo text('logout') ?></a>
					</li>
				</ul>
			</li>
			
			<?php if(isset($websites) && count($websites)>1): ?>
				<!-- websites -->
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<?php echo $websites[$website]['title']; ?>
						<b class="caret"></b>
					</a>
					<ul class="dropdown-menu dropdown-menu-scrollable">
						
						<?php foreach($websites as $website=>$data): ?>
							<?php if($acl->allowed('Backend','access',FALSE,$website)): ?>
								<li>
									<a href="<?php echo URL::to('',array('website'=>$website)) ?>">
										<?php echo $data['title']; ?>
									</a>
								</li>
							<?php endif; ?>
						<?php endforeach; ?>
					</ul>
				</li>
			<?php endif; ?>
			<?php if (isset($frontend) && $frontend): ?>
				<li>
					<!-- to frontend -->
					<a href="<?php echo $frontend; ?>" target="_blank"><span class="glyphicon glyphicon-log-out"></span></a>
				</li>
			<?php endif; ?>
		</ul>
	</div>
</div>
