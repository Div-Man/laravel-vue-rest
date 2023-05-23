<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Главня') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div id="app">
                    <div class="p-6 text-gray-900">
                        <div class="filter">
                            <a @click="sortProducts(sortDesc, $event)"  href="/api/v1/products?page=1" class="text-white uppercase font-semibold text-xs py-2 px-4 bg-gray-800 border-transparent border rounded-md">Сначала свежие продукты</a>
                            &nbsp;&nbsp;
                            <a @click="sortProducts(sortAsc, $event)" href="/api/v1/products?page=1" class="text-white uppercase font-semibold text-xs py-2 px-4 bg-gray-800 border-transparent border rounded-md">Сначала старые продукты</a>

                        </div>
                        <br>
                        <table class="table-product" style="" >
                            <tr>
                                <th>Название продукта</th>
                                <th>Описание</th>
                                <th>Цена</th>
                            </tr>
                            <tr v-for="product in products" :key="product.id">
                                <td>@{{product.product_name}}</td>
                                <td>@{{product.product_description}}</td>
                                <td>@{{product.product_price}}</td>
                                <td>@{{product.product_created_at}}</td>
                            </tr>
                        </table>

                        <div class="pagination-wrap">
                            <div class="pagination">
                                <ul>
                                 <li v-for="link in links">
                                    <a v-if="link.url" @click="sortProducts(sort, $event)" v-bind:href="link.url" v-bind:class="{ 'active-link': link.active}">
                                      @{{ link.label}}
                                    </a>
                                    <span v-else>
                                      @{{ link.label }}
                                    </span>
                                  </li>
                                </ul>
                            </div>
                        </div>
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>

    axios.defaults.withCredentials = true;
    axios.defaults.baseURL = 'http://localhost';


  const listProd = {
        data() {
            return {
                products: null,
                links: null,
                sortAsc: 'asc',
                sortDesc: 'desc',
                sortSelected: null,
            }
        },

        computed: {
            sort() {
                if (this.sortSelected == null || this.sortSelected == 'asc') {
                    return this.sortAsc;
                } else {
                    return this.sortDesc;
                }
            },
        },
        mounted() {
            this.fetchProducts();
        },
        methods: {
            fetchProducts(sort, page) {
                this.sortSelected = sort;

                if(!page){
                    page = '/api/v1/products?page=' + page;
                }
                const url = page + (sort ? `&sort=${sort}` : this.sortAsc);
                 
                axios
                        .get(url)
                        .then(response => {
                            this.products = response.data.data;
                            this.links = response.data.meta.links;
                          
                            this.links[0].label = 'Назад';
                            var temp = this.links.pop();
                            temp.label = 'Вперёд';
                            this.links.push(temp);
                            
                        });
                
            },
            sortProducts(sort, event) {
                 event.preventDefault();
                let page = new URL(event.target).href;
                this.fetchProducts(sort, page);

            }
        }
    }

    Vue.createApp(listProd).mount('#app')

</script>
