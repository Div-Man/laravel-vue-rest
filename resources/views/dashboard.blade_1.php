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
                            <button @click="FreshFood" class="text-white uppercase font-semibold text-xs py-2 px-4 bg-gray-800 border-transparent border rounded-md">Свежие продукты</button>
                            &nbsp;&nbsp;
                            <button @click="OldFood" class="text-white uppercase font-semibold text-xs py-2 px-4 bg-gray-800 border-transparent border rounded-md">Старые продукты</button>

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
            }
        },
        mounted() {
            axios
                    .get('/api/v1/products')
                    .then(response => {
                        this.products = response.data.data;
                    });
        },
        methods: {
            FreshFood() {
                axios
                        .get('/api/v1/products?sort=desc')
                        .then(response => {
                            this.products = response.data.data;
                        });
            },

            OldFood() {
                axios
                        .get('/api/v1/products?sort=asc')
                        .then(response => {
                            this.products = response.data.data;
                        });
            }
        }
    }

    Vue.createApp(listProd).mount('#app')

</script>
