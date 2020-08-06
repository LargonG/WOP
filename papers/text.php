<div id="list">
  <div v-for="category in categories">
    
    <a class="nav-link text-light h4" v-bind:href="'#collapse-' + category.id" data-toggle="collapse" role="button" aria-expanded="false"
    v-bind:aria-controls="'collapse-' + category.id">
        {{ category.name }}
    </a>
    
    <div class="collapse" v-bind:id="'collapse-' + category.id">
      <ul>
        <li v-for="link in category.links"><a class="text-light" v-bind:href="'/papers/' + link.href">{{ link.name }}</a></li>
      </ul>
    </div>

  </div>
  <script src="categories.js"></script>
</div>
