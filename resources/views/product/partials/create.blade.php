<section>
    <div id="app">
        <form class="mt-6 space-y-6" v-on:submit="onSubmit">
            <div>

                <x-input-label for="name" :value="__('Название')" />
                <x-text-input v-model="name" id="name" name="name" type="text" class="mt-1 block w-full"  required autofocus autocomplete="name" />

            </div>
            <div>
                <x-input-label for="description" :value="__('Описание')" />
                <x-text-input v-model="description" id="description" name="description" type="text" class="mt-1 block w-full"  required autofocus autocomplete="name" />

            </div>
            <div>
                <x-input-label for="price" :value="__('Цена')" />
                <x-text-input v-model="price" id="price" name="price" type="number" class="mt-1 block w-full" required autofocus autocomplete="price" />

            </div>

            <div class="flex items-center gap-4">
                <button type="submit" class="text-white uppercase font-semibold text-xs py-2 px-4 bg-gray-800 border-transparent border rounded-md">
                    Добавить
                </button>


            </div>
        </form>
    </div>


    <script>

        axios.defaults.withCredentials = true;
        axios.defaults.baseURL = 'http://localhost';

        const form = {
            data() {
                return {
                    name: '',
                    description: '',
                    price: '',
                }
            },
            methods: {
                onSubmit(e) {
                    e.preventDefault();
                    axios.get('/sanctum/csrf-cookie').then(response => {
                        axios.post('/api/v1/products', {
                            name: this.name,
                            description: this.description,
                            price: this.price,
                        }
                        ).then(response2 => {
                            if(response2.status == 201){
                             window.location.href = "/dashboard";   
                            }
                        }).catch(error => {
                             console.log(error.response.data);
                        })
                    });
                },
            },

        }
        Vue.createApp(form).mount('#app')

    </script>
</section>
