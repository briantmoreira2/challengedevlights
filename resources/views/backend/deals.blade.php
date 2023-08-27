@extends('layouts.app')

@section('content')

<form method="post" action="/subirdeals">
@csrf
<input type="file" class="btn btn-primary">Upload deals</input>
<button type="submit" class="btn btn-primary" >Subir</button>
</form>

<br>

<a type="button" class="btn btn-primary" href="/backend/dealsform">Crear</a><br><br>
<table id="myTable" class="table">


  <thead>
    <tr>
      
    
        <th>Internal Name</th>

        <th>Title</th>

        <th>Game Id</th>

        <th>metacriticLink</th>
     
        <th>dealID</th>
      
      
        <th>storeID</th>

      
        <th>salePrice</th>
      
        <th>normalPrice</th>
        
      
        <th>isOnSale5</th>
       
      
        <th>Savings</th>
        
     
        <th>metacriticScore</th>
        
     
        <th>steamRatingText</th>
     
      
        <th>steamRatingPercent</th>
        
      
        <th>steamRatingCount</th>
        
      
        <th>steamAppID</th>
        
      
        <th>releaseDate</th>
        
      
        <th>lastChange</th>
       
      
        <th>dealRating</th>
      
      
        <th>thumb</th>

        <th>Acciones </th>
       
    </tr>
  </thead>
  <tbody>
    <tr @foreach( $deals as $deal)>
    <td>{{ $deal->internalName }} Name</td>

    <td>{{ $deal->title }}</td>

    <td>{{ $deal->metacriticLink }} Id</td>

    <td>{{ $deal->dealID }}</td>

    <td>{{ $deal->storeID }}</td>


    <td>{{ $deal->gameID }}</td>


    <td>{{ $deal->salePrice }}</td>

    <td>{{ $deal->normalPrice }}</td>


    <td>{{ $deal->isOnSale }}</td>


    <td>{{ $deal->savings }}</td>


    <td>{{ $deal->metacriticScore }}</td>


    <td>{{ $deal->steamRatingText }}</td>


    <td>{{ $deal->steamRatingPercent }}</td>


    <td>{{ $deal->steamRatingCount }}</td>


    <td>{{ $deal->steamAppID }}</td>


    <td>{{ $deal->releaseDate }}</td>


    <td>{{ $deal->lastChange }}</td>


    <td>{{ $deal->dealRating }}</td>


    <td>{{ $deal->thumb }}</td>

    <td> 
    <a href="/backend/dealsform/{{ $deal->id }}">Editar </a>
    <a href="/delete/{{ $deal->id }}">Borrar </a>
    </tr @endforeach>

  </tbody>
</table>

<script type="application/javascript">

$(document).ready( function () {
    $('#myTable').DataTable();
} );

</script>

@endsection