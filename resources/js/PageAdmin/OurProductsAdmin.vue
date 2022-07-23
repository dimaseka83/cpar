<template>
    <v-app>
        <v-card class="my-16">
            <v-data-table :headers="headerCategory" :items="category">
                <template v-slot:item.action="data">
                    <v-tooltip bottom>
                        <template v-slot:activator="{ on }">
                            <v-btn icon v-on="on" @click="editCategory(data.index)">
                                <v-icon>mdi-pencil</v-icon>
                            </v-btn>
                        </template>
                        <span>Edit</span>
                    </v-tooltip>
                    <v-tooltip bottom>
                        <template v-slot:activator="{ on }">
                            <v-btn icon v-on="on" @click="hapusCategory(data.index)">
                                <v-icon>mdi-delete</v-icon>
                            </v-btn>
                        </template>
                        <span>Delete</span>
                    </v-tooltip>
                </template>
                <template v-slot:top>
                    <v-toolbar flat>
                        <v-toolbar-title>Category</v-toolbar-title>
                        <v-spacer></v-spacer>
                        <v-dialog v-model="dialogCategory" max-width="500px">
                            <template v-slot:activator="{ on, attrs}">
                                <v-btn color="primary" dark class="mb-2" v-bind="attrs" v-on="on">Create</v-btn>
                            </template>
                            <v-card>
                                <v-card-title>Create Slide</v-card-title>
                                <v-card-text>
                                    <v-text-field v-model="formCategory.name_cat" label="Name" required></v-text-field>
                                </v-card-text>
                                <v-card-actions>
                                    <v-btn color="blue darken-1" text @click="dialogCategory = false">Close</v-btn>
                                    <v-btn color="blue darken-1" text @click="dialogCategory = false; createCategory()">
                                        Create</v-btn>
                                </v-card-actions>
                            </v-card>
                        </v-dialog>
                    </v-toolbar>
                </template>
            </v-data-table>
            <v-data-table :headers="headerProducts" :items="products">
                <template v-slot:item.img_prod="data">
                    <v-img :src="'/images/ourproducts/products/' + data.item.img_prod" :width="100" :height="100"
                        class="mr-4"></v-img>
                </template>
                <template v-slot:item.action="data">
                    <v-tooltip bottom>
                        <template v-slot:activator="{ on }">
                            <v-btn icon v-on="on" @click="editOurProducts(data.index)">
                                <v-icon>mdi-pencil</v-icon>
                            </v-btn>
                        </template>
                        <span>Edit</span>
                    </v-tooltip>
                    <v-tooltip bottom>
                        <template v-slot:activator="{ on }">
                            <v-btn icon v-on="on" @click="hapusOurProducts(data.index)">
                                <v-icon>mdi-delete</v-icon>
                            </v-btn>
                        </template>
                        <span>Delete</span>
                    </v-tooltip>
                </template>
                <template v-slot:top>
                    <v-toolbar flat>
                        <v-toolbar-title>Our Products</v-toolbar-title>
                        <v-spacer></v-spacer>
                        <v-dialog v-model="dialogProducts" max-width="500px">
                            <template v-slot:activator="{ on, attrs}">
                                <v-btn color="primary" dark class="mb-2" v-bind="attrs" v-on="on">Create</v-btn>
                            </template>
                            <v-card>
                                <v-card-title>Create Slide</v-card-title>
                                <v-card-text>
                                    <v-text-field v-model="formProducts.name_prod" label="Name Produksi" required></v-text-field>
                                    <v-text-field v-model="formProducts.desc_prod" label="Description" required></v-text-field>
                                    <v-text-field v-model="formProducts.category_id" label="Category Id" required>
                                    </v-text-field>
                                    <v-file-input accept="image/*" v-model="formProducts.img_prod" label="Image">
                                    </v-file-input>
                                </v-card-text>
                                <v-card-actions>
                                    <v-btn color="blue darken-1" text @click="dialogProducts = false">Close</v-btn>
                                    <v-btn color="blue darken-1" text
                                        @click="dialogProducts = false; createOurProducts()">
                                        Create</v-btn>
                                </v-card-actions>
                            </v-card>
                        </v-dialog>
                    </v-toolbar>
                </template>
            </v-data-table>
        </v-card>
    </v-app>
</template>
<script>
export default {
    data() {
        return {
            category: [],
            dialogCategory: false,
            headerCategory: [
                { text: '#', value: 'id' },
                { text: 'Name', value: 'name_cat' },
                { text: 'Action', value: 'action' },
            ],
            formCategory: {
                id: '',
                name_cat: '',
            },

            products: [],
            dialogProducts: false,
            headerProducts: [
                { text: 'Image', value: 'img_prod' },
                { text: 'Name', value: 'name_prod' },
                { text: 'Description', value: 'desc_prod' },
                { text: 'Category', value: 'category' },
                { text: 'Action', value: 'action' },
            ],
            formProducts: {
                id: '',
                name_prod: '',
                desc_prod: '',
                img_prod: '',
                category_id: '',
            },

        }
    },
    methods: {
        async loadData() {
            await axios.get('/api/ourproducts/getDataProducts').then(res => {
                this.products = res.data
            })

            await axios.get('/api/ourproducts/getDataCategory').then(res => {
                this.category = res.data
            })
        },

        async createCategory() {
            await axios.post('/api/postourproducts/ourcategory', this.formCategory).then(res => {
                this.dialogCategory = false
                this.loadData();
                this.formCategory = {
                    id: '',
                    name_cat: '',
                }
            })
        },

        editCategory(index) {
            this.formCategory = this.category[index];
            this.dialogCategory = true
        },

        async hapusCategory(index) {
            await axios.post('/api/postourproducts/ourcategoryDelete', this.category[index]).then(res => {
                this.category.splice(index, 1)
            })
        },

        async createOurProducts() {
            var formData = new FormData();
            formData.append('id', this.formProducts.id);
            formData.append('name_prod', this.formProducts.name_prod);
            formData.append('desc_prod', this.formProducts.desc_prod);
            formData.append('image', this.formProducts.img_prod);
            formData.append('category_id', this.formProducts.category_id);
            await axios.post('/api/postourproducts/ourproducts', formData).then(res => {
                this.loadData();
                this.formProducts = {
                    id: '',
                    name_prod: '',
                    desc_prod: '',
                    img_prod: '',
                    category_id: '',
                }
            })
        },

        editOurProducts(index) {
            console.log(this.products[index]);
            this.formProducts = this.products[index];
            this.dialogProducts = true
        },

        async hapusOurProducts(index) {
            await axios.post('/api/postourproducts/ourproductsDelete', this.products[index]).then(res => {
                this.products.splice(index, 1)
            })
        },
    },
    mounted() {
        this.loadData();
    },
}
</script>