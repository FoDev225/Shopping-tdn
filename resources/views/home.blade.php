@extends('layouts.app')

@section('content')
<div class="container">

  <div class="row">     
    <div class="card">
      <div class="card-content">
      <span class="card-title center-align"><h4 class="animate__animated animate__slideInLeft animate__delay-1s" style="color: #e53935">Bienvenue sur MaBoutique !!</h4></span>
        <br>
        <ul class="collapsible">
          <li>
            <div class="collapsible-header"><i class="material-icons" style="color: #d32f2f">info</i><p style="color: #7b1fa2">Informations générales</p></div>
            <div class="collapsible-body informations" style="background-color: #ffcdd2">
              <p>L'une des plus grande plateforme de vente en ligne sur le territoire nationale vous propose un large choix de produits issus des plus grandes marques mondiales. Retrouvez la liste de nos meilleurs produits en faisant un tour sur notre boutique en ligne</p>
              <p><em>Trouvez votre bonheur chez nous !</em></p>
            </div>
          </li>
          <li>
            <div class="collapsible-header"><i class="material-icons" style="color: #d32f2f">local_shipping</i><p style="color: #7b1fa2">Frais d'expédition</p></div>
            <div class="collapsible-body informations" style="background-color: #ffcdd2">
              <p>Vos commandes sont livrées dans les plus brefs délais partout en Côte d'Ivoire ! Pour plus de sécurité et d'efficacité vous avez la possibilité de payer à la livraison. Avec la newsletter MaBoutique, restez connecté pour découvrir les nouvelles gammes de produits constamment mises à jour par nos équipes.</p>
              <p style="color: navy"><strong>L'inscription est necéssaire pour passer une commande</strong></p>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>
 <section style="background-color: #ffcdd2 ">
  <div class="container">
    <div class="row">
      <div class="col s12 cards-container">
        @foreach($products as $product)
          <div class="card">
            <div class="card-image">
              @if($product->quantity)
                <a href="{{ route('produits.show', $product->id) }}">
              @endif
                <img src="/images/thumbs/{{ $product->image }}">
              @if($product->quantity) </a> @endif
            </div>          
            <div class="card-content center-align">
              <p>{{ $product->name }}</p>
              @if($product->quantity)
                <p><strong>{{ number_format($product->price, 2, ',', ' ') }} € TTC</strong></p>
              @else
                <p class="red-text"><strong>Produit en rupture de stock</strong></p>
              @endif
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</section>


@endsection
