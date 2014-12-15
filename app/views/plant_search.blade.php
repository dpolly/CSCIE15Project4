@extends('master')

@section('title')
	Dpolly.me Plant Details
@stop

@section('content')

	<h4>Plant Details</h4>
        <?php
                foreach($plants as $plant)
                {
                  echo  'Common Name: '. $plant->common_name.'<br>'.
                        'Botanical Name: '. $plant->botanical_name. '<br>'.
                        'Family: '. $plant->family->botanical_name. '<br>'.
                        'Categories: ';

                         foreach ($plant->categories as $category)
                         {
                              echo $category->name . ", ";
                         }
                  echo '<br><br>';
                  echo '<a href=/plant/edit/'.$plant->id.' >EDIT </a>';
                }
        ?>
@stop