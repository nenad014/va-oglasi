<h3>Kategorije</h3>
<hr>
<ul class="nav flex-column">
    @foreach ($categories as $cat)
        <li class="nav-item">
        <a class="nav-link" href="#">{{$cat->cat_name}}</a>
      </li>
    @endforeach
</ul>