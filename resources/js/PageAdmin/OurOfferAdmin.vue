<template>
    <v-app>
        <NavAdminVue />
        <div v-if="users == null">
            <p class="my-16">Silahkan Login Terlebih Dahulu. <router-link :to="{ name: 'login' }">Klik disini untuk
                    login
                </router-link>
            </p>
        </div>
        <v-card class="my-16" v-else>
            <v-data-table :headers="headeroffer" :items="offer">
                        <template v-slot:item.action="data">
                     <v-tooltip bottom>
                         <template v-slot:activator="{ on }">
                             <v-btn icon v-on="on" @click="editOffer(data.index)">
                                 <v-icon>mdi-pencil</v-icon>
                             </v-btn>
                         </template>
                         <span>Edit</span>
                     </v-tooltip>
                     <v-tooltip bottom>
                         <template v-slot:activator="{ on }">
                             <v-btn icon v-on="on" @click="hapusOffer(data.index)">
                                 <v-icon>mdi-delete</v-icon>
                             </v-btn>
                         </template>
                         <span>Delete</span>
                     </v-tooltip>
                 </template>
                <template v-slot:top>
                    <v-toolbar flat>
                        <v-toolbar-title>Our Social</v-toolbar-title>
                        <v-spacer></v-spacer>
                        <v-dialog v-model="dialogoffer" max-width="500px">
                            <template v-slot:activator="{ on, attrs}">
                                <v-btn color="primary" dark class="mb-2" v-bind="attrs" v-on="on">Create</v-btn>
                            </template>
                            <v-card>
                                <v-card-title>Create Slide</v-card-title>
                                <v-card-text>
                                    <v-text-field label="Title" v-model="formoffer.title"></v-text-field>
                                    <v-text-field label="Subtitle" v-model="formoffer.subtitle"></v-text-field>
                                </v-card-text>
                                <v-card-actions>
                                    <v-btn color="blue darken-1" text @click="dialogoffer = false">Close</v-btn>
                                    <v-btn color="blue darken-1" text @click="dialogoffer = false; createOffer()">Create</v-btn>
                                </v-card-actions>
                            </v-card>
                        </v-dialog>
                    </v-toolbar>
                </template>
            </v-data-table>
            <v-data-table :headers="headeroffer_prd" :items="offer_prd">
                            <template v-slot:item.image="data">
                    <v-img
                        :src="'/images/offer/offer_prd/'+data.item.image"
                        :width="100"
                        :height="100"
                        class="mr-4"
                    ></v-img>                    
                </template>
                                <template v-slot:item.action="data">
                     <v-tooltip bottom>
                         <template v-slot:activator="{ on }">
                             <v-btn icon v-on="on" @click="editofferprd(data.index)">
                                 <v-icon>mdi-pencil</v-icon>
                             </v-btn>
                         </template>
                         <span>Edit</span>
                     </v-tooltip>
                     <v-tooltip bottom>
                         <template v-slot:activator="{ on }">
                             <v-btn icon v-on="on" @click="hapusofferprd(data.index)">
                                 <v-icon>mdi-delete</v-icon>
                             </v-btn>
                         </template>
                         <span>Delete</span>
                     </v-tooltip>
                 </template>
                <template v-slot:top>
                    <v-toolbar flat>
                        <v-toolbar-title>Offer Products <span class="subtitle-2 text--disabled">(Gambar harus HD)</span>
                        </v-toolbar-title>
                        <v-spacer></v-spacer>
                        <v-dialog v-model="dialogoffer_prd" max-width="500px">
                            <template v-slot:activator="{ on, attrs}">
                                <v-btn color="primary" dark class="mb-2" v-bind="attrs" v-on="on">Create</v-btn>
                            </template>
                            <v-card>
                                <v-card-title>Create Slide</v-card-title>
                                <v-card-text>
                                    <v-text-field label="Title" v-model="formoffer_prd.title"></v-text-field>
                                    <v-text-field label="Subtitle" v-model="formoffer_prd.subtitle"></v-text-field>
                                    <v-file-input accept="image/*" v-model="formoffer_prd.image" label="Image"></v-file-input>
                                </v-card-text>
                                <v-card-actions>
                                    <v-btn color="blue darken-1" text @click="dialogoffer_prd = false">Close</v-btn>
                                    <v-btn color="blue darken-1" text @click="dialogoffer_prd = false; createofferprd()">Create</v-btn>
                                </v-card-actions>
                            </v-card>
                        </v-dialog>
                    </v-toolbar>
                </template>
            </v-data-table>
            <v-data-table :headers="headeroffer_penawaran" :items="offer_penawaran">
                <template v-slot:item.action="data">
                     <v-tooltip bottom>
                         <template v-slot:activator="{ on }">
                             <v-btn icon v-on="on" @click="editOfferPenawaran(data.index)">
                                 <v-icon>mdi-pencil</v-icon>
                             </v-btn>
                         </template>
                         <span>Edit</span>
                     </v-tooltip>
                     <v-tooltip bottom>
                         <template v-slot:activator="{ on }">
                             <v-btn icon v-on="on" @click="hapusOfferPenawaran(data.index)">
                                 <v-icon>mdi-delete</v-icon>
                             </v-btn>
                         </template>
                         <span>Delete</span>
                     </v-tooltip>
                 </template>
                <template v-slot:top>
                    <v-toolbar flat>
                        <v-toolbar-title>Offer Penawaran</v-toolbar-title>
                        <v-spacer></v-spacer>
                        <v-dialog v-model="dialogoffer_penawaran" max-width="500px">
                            <template v-slot:activator="{ on, attrs}">
                                <v-btn color="primary" dark class="mb-2" v-bind="attrs" v-on="on">Create</v-btn>
                            </template>
                            <v-card>
                                <v-card-title>Create Slide</v-card-title>
                                <v-card-text>
                                    <v-text-field label="Title" v-model="formoffer_penawaran.title"></v-text-field>
                                    <v-text-field label="Subtitle" v-model="formoffer_penawaran.subtitle"></v-text-field>
                                </v-card-text>
                                <v-card-actions>
                                    <v-btn color="blue darken-1" text @click="dialogoffer_penawaran = false">Close</v-btn>
                                    <v-btn color="blue darken-1" text @click="dialogoffer_penawaran = false; createOfferPenawaran()">Create</v-btn>
                                </v-card-actions>
                            </v-card>
                        </v-dialog>
                    </v-toolbar>
                </template>
            </v-data-table>
            <v-data-table :headers="headerpage3" :items="page3">
                            <template v-slot:item.action="data">
                     <v-tooltip bottom>
                         <template v-slot:activator="{ on }">
                             <v-btn icon v-on="on" @click="editPage3(data.index)">
                                 <v-icon>mdi-pencil</v-icon>
                             </v-btn>
                         </template>
                         <span>Edit</span>
                     </v-tooltip>
                     <v-tooltip bottom>
                         <template v-slot:activator="{ on }">
                             <v-btn icon v-on="on" @click="hapusPage3(data.index)">
                                 <v-icon>mdi-delete</v-icon>
                             </v-btn>
                         </template>
                         <span>Delete</span>
                     </v-tooltip>
                 </template>
                <template v-slot:top>
                    <v-toolbar flat>
                        <v-toolbar-title>Page 3</v-toolbar-title>
                        <v-spacer></v-spacer>
                        <v-dialog v-model="dialogpage3" max-width="500px">
                            <template v-slot:activator="{ on, attrs}">
                                <v-btn color="primary" dark class="mb-2" v-bind="attrs" v-on="on">Create</v-btn>
                            </template>
                            <v-card>
                                <v-card-title>Create Slide</v-card-title>
                                <v-card-text>
                                    <v-text-field label="Title" v-model="formpage3.title"></v-text-field>
                                    <v-text-field label="Subtitle" v-model="formpage3.subtitle"></v-text-field>
                                </v-card-text>
                                <v-card-actions>
                                    <v-btn color="blue darken-1" text @click="dialogpage3 = false">Close</v-btn>
                                    <v-btn color="blue darken-1" text @click="dialogpage3 = false; createPage3()">Create</v-btn>
                                </v-card-actions>
                            </v-card>
                        </v-dialog>
                    </v-toolbar>
                </template>
            </v-data-table>
            <v-data-table :headers="headersub_page3" :items="sub_page3">
                            <template v-slot:item.icon="data">
                    <v-icon>{{ data.item.icon }}</v-icon>               
                </template>
                                            <template v-slot:item.action="data">
                     <v-tooltip bottom>
                         <template v-slot:activator="{ on }">
                             <v-btn icon v-on="on" @click="editSubPage3(data.index)">
                                 <v-icon>mdi-pencil</v-icon>
                             </v-btn>
                         </template>
                         <span>Edit</span>
                     </v-tooltip>
                     <v-tooltip bottom>
                         <template v-slot:activator="{ on }">
                             <v-btn icon v-on="on" @click="hapusSubPage3(data.index)">
                                 <v-icon>mdi-delete</v-icon>
                             </v-btn>
                         </template>
                         <span>Delete</span>
                     </v-tooltip>
                 </template>
                <template v-slot:top>
                    <v-toolbar flat>
                        <v-toolbar-title>Sub Page 3</v-toolbar-title>
                        <v-spacer></v-spacer>
                        <v-dialog v-model="dialogsub_page3" max-width="500px">
                            <template v-slot:activator="{ on, attrs}">
                                <v-btn color="primary" dark class="mb-2" v-bind="attrs" v-on="on">Create</v-btn>
                            </template>
                            <v-card>
                                <v-card-title>Create Slide</v-card-title>
                                <v-card-text>
                                    <v-text-field label="Icon" v-model="formsub_page3.icon"></v-text-field>
                                    <v-text-field label="Title" v-model="formsub_page3.title"></v-text-field>
                                    <v-text-field label="Subtitle" v-model="formsub_page3.subtitle"></v-text-field>
                                </v-card-text>
                                <v-card-actions>
                                    <v-btn color="blue darken-1" text @click="dialogsub_page3 = false">Close</v-btn>
                                    <v-btn color="blue darken-1" text @click="dialogsub_page3 = false; createSubPage3()">Create</v-btn>
                                </v-card-actions>
                            </v-card>
                        </v-dialog>
                    </v-toolbar>
                </template>
            </v-data-table>
            <v-data-table :headers="headerpage4" :items="page4">
            <template v-slot:item.action="data">
                     <v-tooltip bottom>
                         <template v-slot:activator="{ on }">
                             <v-btn icon v-on="on" @click="editPage4(data.index)">
                                 <v-icon>mdi-pencil</v-icon>
                             </v-btn>
                         </template>
                         <span>Edit</span>
                     </v-tooltip>
                     <v-tooltip bottom>
                         <template v-slot:activator="{ on }">
                             <v-btn icon v-on="on" @click="hapusPage4(data.index)">
                                 <v-icon>mdi-delete</v-icon>
                             </v-btn>
                         </template>
                         <span>Delete</span>
                     </v-tooltip>
                 </template>
                <template v-slot:top>
                    <v-toolbar flat>
                        <v-toolbar-title>Page 4</v-toolbar-title>
                        <v-spacer></v-spacer>
                        <v-dialog v-model="dialogpage4" max-width="500px">
                            <template v-slot:activator="{ on, attrs}">
                                <v-btn color="primary" dark class="mb-2" v-bind="attrs" v-on="on">Create</v-btn>
                            </template>
                            <v-card>
                                <v-card-title>Create Slide</v-card-title>
                                <v-card-text>
                                    <v-text-field label="Title" v-model="formpage4.title"></v-text-field>
                                    <v-text-field label="Subtitle" v-model="formpage4.subtitle"></v-text-field>
                                </v-card-text>
                                <v-card-actions>
                                    <v-btn color="blue darken-1" text @click="dialogpage4 = false">Close</v-btn>
                                    <v-btn color="blue darken-1" text @click="dialogpage4 = false; createPage4()">Create</v-btn>
                                </v-card-actions>
                            </v-card>
                        </v-dialog>
                    </v-toolbar>
                </template>
            </v-data-table>
            <v-data-table :headers="headersub_page5" :items="sub_page5">
             <template v-slot:item.icon="data">
                    <v-icon>{{ data.item.icon }}</v-icon>               
                </template>
                                            <template v-slot:item.action="data">
                     <v-tooltip bottom>
                         <template v-slot:activator="{ on }">
                             <v-btn icon v-on="on" @click="editSubPage5(data.index)">
                                 <v-icon>mdi-pencil</v-icon>
                             </v-btn>
                         </template>
                         <span>Edit</span>
                     </v-tooltip>
                     <v-tooltip bottom>
                         <template v-slot:activator="{ on }">
                             <v-btn icon v-on="on" @click="hapusSubPage5(data.index)">
                                 <v-icon>mdi-delete</v-icon>
                             </v-btn>
                         </template>
                         <span>Delete</span>
                     </v-tooltip>
                 </template>
                <template v-slot:top>
                    <v-toolbar flat>
                        <v-toolbar-title>Sub Page 5</v-toolbar-title>
                        <v-spacer></v-spacer>
                        <v-dialog v-model="dialogsub_page5" max-width="500px">
                            <template v-slot:activator="{ on, attrs}">
                                <v-btn color="primary" dark class="mb-2" v-bind="attrs" v-on="on">Create</v-btn>
                            </template>
                            <v-card>
                                <v-card-title>Create Slide</v-card-title>
                                <v-card-text>
                                    <v-text-field label="Icon" v-model="formsub_page5.icon"></v-text-field>
                                    <v-text-field label="Title" v-model="formsub_page5.title"></v-text-field>
                                    <v-text-field label="Subtitle" v-model="formsub_page5.subtitle"></v-text-field>
                                </v-card-text>
                                <v-card-actions>
                                    <v-btn color="blue darken-1" text @click="dialogsub_page5 = false">Close</v-btn>
                                    <v-btn color="blue darken-1" text @click="dialogsub_page5 = false; createSubPage5()">Create</v-btn>
                                </v-card-actions>
                            </v-card>
                        </v-dialog>
                    </v-toolbar>
                </template>
            </v-data-table>
            <v-data-table :headers="headerpage6" :items="page6">
                                    <template v-slot:item.action="data">
                     <v-tooltip bottom>
                         <template v-slot:activator="{ on }">
                             <v-btn icon v-on="on" @click="editPage6(data.index)">
                                 <v-icon>mdi-pencil</v-icon>
                             </v-btn>
                         </template>
                         <span>Edit</span>
                     </v-tooltip>
                     <v-tooltip bottom>
                         <template v-slot:activator="{ on }">
                             <v-btn icon v-on="on" @click="hapusPage6(data.index)">
                                 <v-icon>mdi-delete</v-icon>
                             </v-btn>
                         </template>
                         <span>Delete</span>
                     </v-tooltip>
                 </template>
                <template v-slot:top>
                    <v-toolbar flat>
                        <v-toolbar-title>Page 6</v-toolbar-title>
                        <v-spacer></v-spacer>
                        <v-dialog v-model="dialogpage6" max-width="500px">
                            <template v-slot:activator="{ on, attrs}">
                                <v-btn color="primary" dark class="mb-2" v-bind="attrs" v-on="on">Create</v-btn>
                            </template>
                            <v-card>
                                <v-card-title>Create Slide</v-card-title>
                                <v-card-text>
                                    <v-text-field label="Title" v-model="formpage6.title"></v-text-field>
                                    <v-text-field label="Subtitle" v-model="formpage6.subtitle"></v-text-field>
                                </v-card-text>
                                <v-card-actions>
                                    <v-btn color="blue darken-1" text @click="dialogpage6 = false">Close</v-btn>
                                    <v-btn color="blue darken-1" text @click="dialogpage6 = false; createPage6()">Create</v-btn>
                                </v-card-actions>
                            </v-card>
                        </v-dialog>
                    </v-toolbar>
                </template>
            </v-data-table>
            <v-data-table :headers="headersubpage6" :items="subpage6">
                                                <template v-slot:item.action="data">
                     <v-tooltip bottom>
                         <template v-slot:activator="{ on }">
                             <v-btn icon v-on="on" @click="editSubPage6(data.index)">
                                 <v-icon>mdi-pencil</v-icon>
                             </v-btn>
                         </template>
                         <span>Edit</span>
                     </v-tooltip>
                     <v-tooltip bottom>
                         <template v-slot:activator="{ on }">
                             <v-btn icon v-on="on" @click="hapusSubPage6(data.index)">
                                 <v-icon>mdi-delete</v-icon>
                             </v-btn>
                         </template>
                         <span>Delete</span>
                     </v-tooltip>
                 </template>
                <template v-slot:top>
                    <v-toolbar flat>
                        <v-toolbar-title>Sub Page 6</v-toolbar-title>
                        <v-spacer></v-spacer>
                        <v-dialog v-model="dialogsubpage6" max-width="500px">
                            <template v-slot:activator="{ on, attrs}">
                                <v-btn color="primary" dark class="mb-2" v-bind="attrs" v-on="on">Create</v-btn>
                            </template>
                            <v-card>
                                <v-card-title>Create Slide</v-card-title>
                                <v-card-text>
                                    <v-text-field label="Number" v-model="formsubpage6.number"></v-text-field>
                                    <v-text-field label="Title" v-model="formsubpage6.title"></v-text-field>
                                    <v-text-field label="Subtitle" v-model="formsubpage6.subtitle"></v-text-field>
                                </v-card-text>
                                <v-card-actions>
                                    <v-btn color="blue darken-1" text @click="dialogsubpage6 = false">Close</v-btn>
                                    <v-btn color="blue darken-1" text @click="dialogsubpage6 = false; createSubPage6()">Create</v-btn>
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
import NavAdminVue from '../components/NavAdmin.vue';
import mix from '../mixins/mix.js';
export default {
    mixins: [mix],
    components: {
        NavAdminVue,
    },
    data() {
        return {
            offer: [],
            dialogoffer: false,
            headeroffer: [
                { text: 'Title', value: 'title' },
                { text: 'Subtitle', value: 'subtitle' },
                { text: 'Action', value: 'action' },
            ],
            formoffer: {
                id: '',
                title: '',
                subtitle: '',
            },

            offer_prd: [],
            dialogoffer_prd: false,
            headeroffer_prd: [
                { text: 'Image', value: 'image' },
                { text: 'Title', value: 'title' },
                { text: 'Subtitle', value: 'subtitle' },
                { text: 'Action', value: 'action' },
            ],
            formoffer_prd: {
                id: '',
                image: '',
                title: '',
                subtitle: '',
            },

            offer_penawaran: [],
            dialogoffer_penawaran: false,
            headeroffer_penawaran: [
                { text: 'Title', value: 'title' },
                { text: 'Subtitle', value: 'subtitle' },
                { text: 'Action', value: 'action' },
            ],
            formoffer_penawaran: {
                id: '',
                title: '',
                subtitle: '',
            },
            page3: [],
            dialogpage3: false,
            headerpage3: [
                { text: 'Title', value: 'title' },
                { text: 'Subtitle', value: 'subtitle' },
                { text: 'Action', value: 'action' },
            ],
            formpage3: {
                id: '',
                title: '',
                subtitle: '',
            },
            sub_page3: [],
            dialogsub_page3: false,
            headersub_page3: [
                { text: 'Icon', value: 'icon' },
                { text: 'Title', value: 'title' },
                { text: 'Subtitle', value: 'subtitle' },
                { text: 'Action', value: 'action' },
            ],
            formsub_page3: {
                id: '',
                icon: '',
                title: '',
                subtitle: '',
            },
            page4: [],
            dialogpage4: false,
            headerpage4: [
                { text: 'Title', value: 'title' },
                { text: 'Subtitle', value: 'subtitle' },
                { text: 'Action', value: 'action' },
            ],
            formpage4: {
                id: '',
                title: '',
                subtitle: '',
            },
            sub_page5: [],
            dialogsub_page5: false,
            headersub_page5: [
                { text: 'Icon', value: 'icon' },
                { text: 'Title', value: 'title' },
                { text: 'Subtitle', value: 'subtitle' },
                { text: 'Action', value: 'action' },
            ],
            formsub_page5: {
                id: '',
                icon: '',
                title: '',
                subtitle: '',
            },
            page6: [],
            dialogpage6: false,
            headerpage6: [
                { text: 'Title', value: 'title' },
                { text: 'Subtitle', value: 'subtitle' },
                { text: 'Action', value: 'action' },
            ],
            formpage6: {
                id: '',
                title: '',
                subtitle: '',
            },
            subpage6: [],
            dialogsubpage6: false,
            headersubpage6: [
                { text: 'Number', value: 'number' },
                { text: 'Title', value: 'title' },
                { text: 'Subtitle', value: 'subtitle' },
                { text: 'Action', value: 'action' },
            ],
            formsubpage6: {
                id: '',
                number: '',
                title: '',
                subtitle: '',
            },
        }
    },
    methods: {
                async loadData(){
            await axios.get('/api/offers/offer').then(res => {
                this.offer = res.data
            })

            await axios.get('/api/offers/offer_prd').then(res => {
                this.offer_prd = res.data
            })

            await axios.get('/api/offers/offer_penawaran').then(res => {
                this.offer_penawaran = res.data
            })

            await axios.get('/api/offers/page3').then(res => {
                this.page3 = res.data
            })

            await axios.get('/api/offers/sub_page3').then(res => {
                this.sub_page3 = res.data
            })

            await axios.get('/api/offers/page4').then(res => {
                this.page4 = res.data
            })

            await axios.get('/api/offers/sub_page5').then(res => {
                this.sub_page5 = res.data
            })

            await axios.get('/api/offers/page6').then(res => {
                this.page6 = res.data
            })
            
            await axios.get('/api/offers/sub_page6').then(res => {
                this.subpage6 = res.data
            })
            this.loading = false
        },
        async createOffer(){
            await axios.post('/api/postOffer/offer', this.formoffer).then(res => {
                this.loadData()
                this.formoffer = {
                    id: '',
                    title: '',
                    subtitle: '',
                }
            })
        },

        editOffer(index){
            this.formoffer = this.offer[index]
            this.dialogoffer = true
        },

        async hapusOffer(index){
            await axios.post('/api/postOffer/offerDelete', this.offer[index]).then(res => {
                this.offer.splice(index, 1)
            })
        },

        async createofferprd(){
            var formData = new FormData()
            formData.append('id', this.formoffer_prd.id)
            formData.append('image', this.formoffer_prd.image)
            formData.append('title', this.formoffer_prd.title)
            formData.append('subtitle', this.formoffer_prd.subtitle)
            await axios.post('/api/postOffer/offer_prd', formData).then(res => {
                this.loadData()
                this.formoffer_prd = {
                    id: '',
                    image: '',
                    title: '',
                    subtitle: '',
                }
            })
        },

        editofferprd(index){
            this.formoffer_prd = this.offer_prd[index]
            this.dialogoffer_prd = true
        },

        async hapusofferprd(index){
            await axios.post('/api/postOffer/offer_prdDelete', this.offer_prd[index]).then(res => {
                this.offer_prd.splice(index, 1)
            })
        },

        async createOfferPenawaran(){
            await axios.post('/api/postOffer/offer_penawaran', this.formoffer_penawaran).then(res => {
                this.loadData()
                this.formoffer_penawaran = {
                    id: '',
                    title: '',
                    subtitle: '',
                }
            })
        },

        editOfferPenawaran(index){
            this.formoffer_penawaran = this.offer_penawaran[index]
            this.dialogoffer_penawaran = true
        },

        async hapusOfferPenawaran(index){
            await axios.post('/api/postOffer/offer_penawaranDelete', this.offer_penawaran[index]).then(res => {
                this.offer_penawaran.splice(index, 1)
            })
        },

        async createPage3(){
            await axios.post('/api/postOffer/page3', this.formpage3).then(res => {
                this.loadData()
                this.formpage3 = {
                    id: '',
                    title: '',
                    subtitle: '',
                }
            })
        },

        editPage3(index){
            this.formpage3 = this.page3[index]
            this.dialogpage3 = true
        },

        async hapusPage3(index){
            await axios.post('/api/postOffer/page3Delete', this.page3[index]).then(res => {
                this.page3.splice(index, 1)
            })
        },

        async createSubPage3(){
            await axios.post('/api/postOffer/sub_page3', this.formsub_page3).then(res => {
                this.loadData()
                this.formsub_page3 = {
                    id: '',
                    icon: '',
                    title: '',
                    subtitle: '',
                }
            })
        },

        editSubPage3(index){
            this.formsub_page3 = this.sub_page3[index]
            this.dialogsub_page3 = true
        },

        async hapusSubPage3(index){
            await axios.post('/api/postOffer/hapusSubPage3', this.sub_page3[index]).then(res => {
                this.sub_page3.splice(index, 1)
            })
        },

        async createPage4(){
            await axios.post('/api/postOffer/page4', this.formpage4).then(res => {
                this.loadData()
                this.formpage4 = {
                    id: '',
                    title: '',
                    subtitle: '',
                }
            })
        },

        editPage4(index){
            this.formpage4 = this.page4[index]
            this.dialogpage4 = true
        },

        async hapusPage4(index){
            await axios.post('/api/postOffer/page4Delete', this.page4[index]).then(res => {
                this.page4.splice(index, 1)
            })
        },

        async createSubPage5(){
            await axios.post('/api/postOffer/sub_page5', this.formsub_page5).then(res => {
                this.loadData()
                this.formsub_page5 = {
                    id: '',
                    icon: '',
                    title: '',
                    subtitle: '',
                }
            })
        },

        editSubPage5(index){
            this.formsub_page5 = this.sub_page5[index]
            this.dialogsub_page5 = true
        },

        async hapusSubPage5(index){
            await axios.post('/api/postOffer/hapusSubPage5', this.sub_page5[index]).then(res => {
                this.sub_page5.splice(index, 1)
            })
        },

        async createPage6(){
            await axios.post('/api/postOffer/page6', this.formpage6).then(res => {
                this.loadData()
                this.formpage6 = {
                    id: '',
                    title: '',
                    subtitle: '',
                }
            })
        },

        editPage6(index){
            this.formpage6 = this.page6[index]
            this.dialogpage6 = true
        },

        async hapusPage6(index){
            await axios.post('/api/postOffer/page6Delete', this.page6[index]).then(res => {
                this.page6.splice(index, 1)
            })
        },
        
        async createSubPage6(){
            await axios.post('/api/postOffer/sub_page6', this.formsubpage6).then(res => {
                this.loadData()
                this.formsubpage6 = {
                    id: '',
                    icon: '',
                    title: '',
                    subtitle: '',
                }
            })
        },

        editSubPage6(index){
            this.formsubpage6 = this.subpage6[index]
            this.dialogsubpage6 = true
        },

        async hapusSubPage6(index){
            await axios.post('/api/postOffer/hapusSubPage6', this.subpage6[index]).then(res => {
                this.subpage6.splice(index, 1)
            })
        },
    },
        mounted() {
        this.loadData()
    },
}
</script>