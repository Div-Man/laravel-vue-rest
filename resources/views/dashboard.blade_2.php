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
                            <button @click="sortProducts(sortDesc)" class="text-white uppercase font-semibold text-xs py-2 px-4 bg-gray-800 border-transparent border rounded-md">Свежие продукты</button>
                            &nbsp;&nbsp;
                            <button @click="sortProducts(sortAsc)" class="text-white uppercase font-semibold text-xs py-2 px-4 bg-gray-800 border-transparent border rounded-md">Старые продукты</button>

                        </div>
                        <br>

                        <table class="table-product" style="">
                            <tr>
                                <th>Название продукта</th>
                                <th>Описание</th>
                                <th>Цена</th>
                            </tr>
                            <tr v-for="product in products">
                                <td>@{{product.product_name}}</td>
                                <td>@{{product.product_description}}</td>
                                <td>@{{product.product_price}}</td>
                            </tr>
                        </table>
                        <div class="pagination">
                            &nbsp;<span @click="sortProducts(sort, prevPageNumber)">педыдущая</span> &nbsp;<span>@{{current_page}}</span> &nbsp; <span @click="sortProducts(sort, nextPageNumber)">следующая</span>

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
                current_page: null,
                next_page: null,
                prev_page: null,
                sortAsc: 'asc',
                sortDesc: 'desc',
                sortSelected: null,
            }
        },

        computed: {
            nextPageNumber() {
                if (this.next_page != null) {
                    const url = new URL(this.next_page);
                    const page = url.searchParams.get('page');
                    return page ? parseInt(page) : 1;
                }
                return null;
            },
            
              prevPageNumber() {
                if (this.prev_page) {
                    const url = new URL(this.prev_page);
                    const page = url.searchParams.get('page');
                    return page ? parseInt(page) : null;
                }
                return null;
            },
            
            sort() {
                if(this.sortSelected == null || this.sortSelected == 'asc'){
                    return 'asc';
                }
                else {
                    return 'desc';
                }
            }
        },
        mounted() {
            this.fetchProducts();
        },
        methods: {
            fetchProducts(sort, page) {

                //const page = this.nextPageNumber || 1;
                this.sortSelected = sort;
                console.log(this.next_page);
  
                const url = '/api/v1/products?page=' + page + (sort ? `&sort=${sort}` : this.sortAsc);
                axios
                        .get(url)
                        .then(response => {
                            this.products = response.data.data;
                            this.current_page = response.data.meta.current_page;
                            this.next_page = response.data.links.next;
                            this.prev_page = response.data.links.prev;
                            console.log(response.data);
                        });
            },
            sortProducts(sort, page) {
                this.fetchProducts(sort, page);
            }
        }
    }

    Vue.createApp(listProd).mount('#app')


</script>
