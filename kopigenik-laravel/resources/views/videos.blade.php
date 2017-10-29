@extends('layouts.app')

@section('title','Videos')

@section('content')
	<!--top-->
	<div class="jumbotron text-center">
		<h1>Video</h1>
		<p>Lihat barista lain dengan teknik brewing andalan mereka untuk mendapatkan hasil brewing yang maksimal.</p>
		
	</div>
	
	<!--body-->
	<div class="container-fluid container-after-jumbotron">
		<div class="row">
			<h3 style="padding: 0 15px;">Video Unggulan</h3>
			<div class="col-sm-12">
				<div class="embed-responsive embed-responsive-16by9">
					<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/OTVE5iPMKLg" frameborder="0" allowfullscreen></iframe>
				</div>
				<h4 style="margin-bottom: 0; float: left;">Videos A</h4><span style="float: right; margin-top: 10px;">1,530 views</span>
				<p style="color: #999; clear: both;">Kent Ora</p>												
			</div>			
		</div>
		<hr>		
		<div class="row">
			<h3 style="padding: 0 15px;">Video Populer</h3>			
			<div class="col-sm-4">
				<div class="embed-responsive embed-responsive-16by9">
					<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/aBLYSO0DSVI" frameborder="0" allowfullscreen></iframe>
				</div>
				<h4 style="margin-bottom: 0; float: left;">Videos B</h4><span style="float: right; margin-top: 10px;">2,330 views</span>
				<p style="color: #999; clear: both;">Kent Ora</p>																
			</div>
			<div class="col-sm-4">
				<div class="embed-responsive embed-responsive-16by9">
					<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/aBLYSO0DSVI" frameborder="0" allowfullscreen></iframe>
				</div>
				<h4 style="margin-bottom: 0; float: left;">Videos B</h4><span style="float: right; margin-top: 10px;">1,340 views</span>
				<p style="color: #999; clear: both;">Optimus Prime</p>																
			</div>
			<div class="col-sm-4">
				<div class="embed-responsive embed-responsive-16by9">
					<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/aBLYSO0DSVI" frameborder="0" allowfullscreen></iframe>
				</div>
				<h4 style="margin-bottom: 0; float: left;">Videos B</h4><span style="float: right; margin-top: 10px;">840 views</span>
				<p style="color: #999; clear: both;">Char Stan</p>																
			</div>
		</div>
		<hr>
		<div class="row">		
			<h3 style="padding: 0 15px;">Video Lainnya</h3>	
			<div class="col-sm-4">
				<div class="embed-responsive embed-responsive-16by9">
					<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/MMMcfnQR5Js" frameborder="0" allowfullscreen></iframe>
				</div>
				<h4 style="margin-bottom: 0; float: left;">Videos C</h4><span style="float: right; margin-top: 10px;">2,330 views</span>
				<p style="color: #999; clear: both;">Kent Ora</p>																
			</div>
			<div class="col-sm-4">
				<div class="embed-responsive embed-responsive-16by9">
					<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/MMMcfnQR5Js" frameborder="0" allowfullscreen></iframe>
				</div>
				<h4 style="margin-bottom: 0; float: left;">Videos C</h4><span style="float: right; margin-top: 10px;">1,340 views</span>
				<p style="color: #999; clear: both;">Optimus Prime</p>																
			</div>
			<div class="col-sm-4">
				<div class="embed-responsive embed-responsive-16by9">
					<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/MMMcfnQR5Js" frameborder="0" allowfullscreen></iframe>
				</div>
				<h4 style="margin-bottom: 0; float: left;">Videos C</h4><span style="float: right; margin-top: 10px;">840 views</span>
				<p style="color: #999; clear: both;">Char Eta</p>																
			</div>
		</div>
		<hr>
		<!--<div class="row">			
			<div class="col-sm-4">
				<h3>More Videos</h3>
				
				<a class="btn" data-toggle="modal" data-target="#myModal">
				  <img src="https://i.ytimg.com/vi/Hd5Rr-XT7AA/hqdefault.jpg?sqp=-oaymwEXCPYBEIoBSFryq4qpAwkIARUAAIhCGAE=&rs=AOn4CLCWUDjxZhAT0P0xATbS4FXanmNrzw" width="396">
				</a>
				<h4>Videos D</h4>

			
				<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  <div class="modal-dialog modal-lg" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title" id="myModalLabel">Deconstructing Coffee</h4>
				      </div>
				      <div class="modal-body">
				        <iframe width="640" height="360" src="https://www.youtube.com/embed/Hd5Rr-XT7AA" frameborder="0" allowfullscreen></iframe>
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				      </div>
				    </div>
				  </div>
				</div>														
			</div>
			<div class="col-sm-4">
			
				<a class="btn" data-toggle="modal" data-target="#myModal">
				  <img src="https://i.ytimg.com/vi/Hd5Rr-XT7AA/hqdefault.jpg?sqp=-oaymwEXCPYBEIoBSFryq4qpAwkIARUAAIhCGAE=&rs=AOn4CLCWUDjxZhAT0P0xATbS4FXanmNrzw" width="396">
				</a>
				<h4>Videos E</h4>

				
				<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  <div class="modal-dialog modal-lg" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title" id="myModalLabel">Deconstructing Coffee</h4>
				      </div>
				      <div class="modal-body">
				        <iframe width="640" height="360" src="https://www.youtube.com/embed/Hd5Rr-XT7AA" frameborder="0" allowfullscreen></iframe>
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				      </div>
				    </div>
				  </div>
				</div>														
			</div>
			<div class="col-sm-4">
				
				<a class="btn" data-toggle="modal" data-target="#myModal">
				  <img src="https://i.ytimg.com/vi/Hd5Rr-XT7AA/hqdefault.jpg?sqp=-oaymwEXCPYBEIoBSFryq4qpAwkIARUAAIhCGAE=&rs=AOn4CLCWUDjxZhAT0P0xATbS4FXanmNrzw" width="396">
				</a>
				<h4>Videos F</h4>

			
				<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  <div class="modal-dialog modal-lg" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title" id="myModalLabel">Deconstructing Coffee</h4>
				      </div>
				      <div class="modal-body">
				        <iframe width="640" height="360" src="https://www.youtube.com/embed/Hd5Rr-XT7AA" frameborder="0" allowfullscreen></iframe>
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				      </div>
				    </div>
				  </div>
				</div>														
			</div>
		</div>
		<hr>-->
	</div>
@endsection