<?php use App\Setting; ?>
@extends('layouts.dashboard')
@section('page_heading','Store Config')

@section('section')
<div class="col-sm-12">

<div class="row">
	<div class="col-sm-12">
		@section ('cotable_panel_title','Company Information')
		@section ('cotable_panel_body')
		<table class="table table-bordered">
			<tbody>
				<tr>
					<th style="width: 20%; text-align: right; vertical-align:middle;">{{trans('config.config_company')}}</th>
					<td><input class="form-control" name="company" type="text" value="{{ Setting::isi('company') }}" required ></td>
				</tr>
				<tr>
					<th style="width: 20%; text-align: right; vertical-align:middle">{{trans('config.config_address')}}</td>
					<td><textarea class="form-control" name="address" required >{{ Setting::isi('address') }}</textarea></td>
				</tr>
				<tr>
					<th style="width: 20%; text-align: right; vertical-align:middle">{{trans('config.config_phone')}}</td>
					<td><input type="text" class="form-control" name="phone" value="{{ Setting::isi('phone') }}" required ></td>
				</tr>
				<tr>
					<th style="width: 20%; text-align: right; vertical-align:middle">{{trans('config.config_website')}}</td>
					<td><input type="text" class="form-control" name="website" value="{{ Setting::isi('website') }}"></td>
				</tr>
				
			</tbody>
		</table>	
	
				
		@endsection

		@include('widgets.panel', array('header'=>true, 'as'=>'cotable'))
	</div>
</div>

</div>
@stop