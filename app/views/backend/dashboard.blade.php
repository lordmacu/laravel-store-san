@extends('backend/layouts/default')

@section('content')

<div class="row">
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat blue">
						<div class="visual">
							<i class="fa fa-user"></i>
						</div>
						<div class="details">
							<div class="number">
								 {{count($usuarios)}}
							</div>
							<div class="desc">
								Usuarios
							</div>
						</div>
						<a class="more" href="{{ route('users') }}">
							 Ver todos <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat green">
						<div class="visual">
							<i class="fa fa-shopping-cart"></i>
						</div>
						<div class="details">
							<div class="number">
								 0
							</div>
							<div class="desc">
								Productos
							</div>
						</div>
						<a class="more" href="{{ route('users') }}">
							Ver todos  <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat purple">
						<div class="visual">
							<i class="fa fa-building-o"></i>
						</div>
						<div class="details">
							<div class="number">
								0
							</div>
							<div class="desc">
								 Tiendas
							</div>
						</div>
						<a class="more" href="#">
							 Ver todos <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
			<!---	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat yellow">
						<div class="visual">
							<i class="fa fa-bar-chart-o"></i>
						</div>
						<div class="details">
							<div class="number">
								 12,5M$
							</div>
							<div class="desc">
								 Total Profit
							</div>
						</div>
						<a class="more" href="#">
							 View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
			</div>-->
			</div>
			
			
					<div class="row ">
				<div class="col-md-6 col-sm-6">
					<div class="portlet box light-grey">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-bell-o"></i>Pedidos
							</div>
						
						</div>
						<div class="portlet-body">
							<div class="scroller" style="height: 300px;" data-always-visible="1" data-rail-visible="0">
								<ul class="feeds">
									<li>
										<div class="col1">
											<div class="cont">
												<div class="cont-col1">
													<div class="label label-sm label-info">
														<i class="fa fa-check"></i>
													</div>
												</div>
												<div class="cont-col2">
													<div class="desc">
														 You have 4 pending tasks.
														<span class="label label-sm label-warning ">
															 Take action <i class="fa fa-share"></i>
														</span>
													</div>
												</div>
											</div>
										</div>
										<div class="col2">
											<div class="date">
												 Just now
											</div>
										</div>
									</li>
									
								
								
								</ul>
							</div>
							<div class="scroller-footer">
								<div class="pull-right">
									<a href="#">
										Ver todos los pedidos <i class="m-icon-swapright m-icon-gray"></i>
									</a>
									 &nbsp;
								</div>
							</div>
						</div>
					</div>
				</div>
			<div class="col-md-6 col-sm-6">
					<!-- BEGIN PORTLET-->
					<div class="portlet box light-grey">
						<div class="portlet-title line">
							<div class="caption">
								<i class="fa fa-comments"></i>Mensajes
							</div>
							<div class="tools">
								<a href="" class="collapse">
								</a>
								<a href="#portlet-config" data-toggle="modal" class="config">
								</a>
								<a href="" class="reload">
								</a>
								<a href="" class="remove">
								</a>
							</div>
						</div>
						<div class="portlet-body" id="chats">
							<div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 435px;"><div class="scroller" style="height: 435px; overflow: hidden; width: auto;" data-always-visible="1" data-rail-visible1="1">
								<ul class="chats">
									<li class="in">
										<img class="avatar img-responsive" alt="" src="assets/img/avatar1.jpg">
										<div class="message">
											<span class="arrow">
											</span>
											<a href="#" class="name">
												Mensaje prueba
											</a>
											<span class="datetime">
												 en  Julio 25, 2012 11:09
											</span>
											<span class="body">
esta es una prueba de mensaje
											</span>
										</div>
									</li>
								
							
								</ul>
							</div><div class="slimScrollBar" style="background-color: rgb(187, 187, 187); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-top-left-radius: 7px; border-top-right-radius: 7px; border-bottom-right-radius: 7px; border-bottom-left-radius: 7px; z-index: 99; right: 1px; height: 283.27095808383234px; background-position: initial initial; background-repeat: initial initial;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-top-left-radius: 7px; border-top-right-radius: 7px; border-bottom-right-radius: 7px; border-bottom-left-radius: 7px; background-color: rgb(234, 234, 234); opacity: 0.2; z-index: 90; right: 1px; background-position: initial initial; background-repeat: initial initial;"></div></div>
							<div class="chat-form">
								<div class="input-cont">
									<input class="form-control" type="text" placeholder="Type a message here...">
								</div>
								<div class="btn-cont">
									<span class="arrow">
									</span>
									<a href="" class="btn blue icn-only">
										<i class="fa fa-check icon-white"></i>
									</a>
								</div>
							</div>
						</div>
					</div>
					<!-- END PORTLET-->
				</div>
			</div>

@stop
