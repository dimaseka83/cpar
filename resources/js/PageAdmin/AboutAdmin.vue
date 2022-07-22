 <template>
     <v-app>
         <v-card class="my-16">
             <v-data-table :headers="headersmission" :items="mission">
                 <template v-slot:item.action="data">
                     <v-tooltip bottom>
                         <template v-slot:activator="{ on }">
                             <v-btn icon v-on="on" @click="editMission(data.index)">
                                 <v-icon>mdi-pencil</v-icon>
                             </v-btn>
                         </template>
                         <span>Edit</span>
                     </v-tooltip>
                     <v-tooltip bottom>
                         <template v-slot:activator="{ on }">
                             <v-btn icon v-on="on" @click="hapusMission(data.index)">
                                 <v-icon>mdi-delete</v-icon>
                             </v-btn>
                         </template>
                         <span>Delete</span>
                     </v-tooltip>
                 </template>
                 <template v-slot:top>
                     <v-toolbar flat>
                         <v-toolbar-title>Mission </v-toolbar-title>
                         <v-spacer></v-spacer>
                         <v-dialog v-model="dialogMission" max-width="500px">
                             <template v-slot:activator="{ on, attrs}">
                                 <v-btn color="primary" dark class="mb-2" v-bind="attrs" v-on="on">Create</v-btn>
                             </template>
                             <v-card>
                                 <v-card-title>Create Slide</v-card-title>
                                 <v-card-text>
                                     <v-text-field label="Title" v-model="formmission.title"></v-text-field>
                                     <v-text-field label="Subtitle" v-model="formmission.subtitle"></v-text-field>
                                 </v-card-text>
                                 <v-card-actions>
                                     <v-btn color="blue darken-1" text @click="dialogMission = false">Close</v-btn>
                                     <v-btn color="blue darken-1" text @click="dialogMission = false; createMission()">
                                         Create</v-btn>
                                 </v-card-actions>
                             </v-card>
                         </v-dialog>
                     </v-toolbar>
                 </template>
             </v-data-table>
             <v-data-table :headers="headersmissioncontent" :items="missioncontent">
                 <template v-slot:item.action="data">
                     <v-tooltip bottom>
                         <template v-slot:activator="{ on }">
                             <v-btn icon v-on="on" @click="editMissionContent(data.index)">
                                 <v-icon>mdi-pencil</v-icon>
                             </v-btn>
                         </template>
                         <span>Edit</span>
                     </v-tooltip>
                     <v-tooltip bottom>
                         <template v-slot:activator="{ on }">
                             <v-btn icon v-on="on" @click="hapusMissionContent(data.index)">
                                 <v-icon>mdi-delete</v-icon>
                             </v-btn>
                         </template>
                         <span>Delete</span>
                     </v-tooltip>
                 </template>
                 <template v-slot:top>
                     <v-toolbar flat>
                         <v-toolbar-title>Mission Content</v-toolbar-title>
                         <v-spacer></v-spacer>
                         <v-dialog v-model="dialogMissionContent" max-width="500px">
                             <template v-slot:activator="{ on, attrs}">
                                 <v-btn color="primary" dark class="mb-2" v-bind="attrs" v-on="on">Create</v-btn>
                             </template>
                             <v-card>
                                 <v-card-title>Create Slide</v-card-title>
                                 <v-card-text>
                                     <v-text-field label="Mission Id" v-model="formmissioncontent.mission_id"></v-text-field>
                                     <v-text-field label="Text" v-model="formmissioncontent.text"></v-text-field>
                                 </v-card-text>
                                 <v-card-actions>
                                     <v-btn color="blue darken-1" text @click="dialogMissionContent = false">Close
                                     </v-btn>
                                     <v-btn color="blue darken-1" text
                                         @click="dialogMissionContent = false; createMissionContent()">
                                         Create</v-btn>
                                 </v-card-actions>
                             </v-card>
                         </v-dialog>
                     </v-toolbar>
                 </template>
             </v-data-table>
             <v-data-table :headers="headersAboutCEO" :items="about_ceo">
                <template v-slot:item.image="data">
                    <v-img
                        :src="'/images/about/about_ceo/'+data.item.image"
                        :width="100"
                        :height="100"
                        class="mr-4"
                    ></v-img>                    
                </template>
                <template v-slot:item.action="data">
                     <v-tooltip bottom>
                         <template v-slot:activator="{ on }">
                             <v-btn icon v-on="on" @click="editAboutCEO(data.index)">
                                 <v-icon>mdi-pencil</v-icon>
                             </v-btn>
                         </template>
                         <span>Edit</span>
                     </v-tooltip>
                     <v-tooltip bottom>
                         <template v-slot:activator="{ on }">
                             <v-btn icon v-on="on" @click="hapusAboutCEO(data.index)">
                                 <v-icon>mdi-delete</v-icon>
                             </v-btn>
                         </template>
                         <span>Delete</span>
                     </v-tooltip>
                 </template>
                 <template v-slot:top>
                     <v-toolbar flat>
                         <v-toolbar-title>About CEO </v-toolbar-title>
                         <v-spacer></v-spacer>
                         <v-dialog v-model="dialogAboutCEO" max-width="500px">
                             <template v-slot:activator="{ on, attrs}">
                                 <v-btn color="primary" dark class="mb-2" v-bind="attrs" v-on="on">Create</v-btn>
                             </template>
                             <v-card>
                                 <v-card-title>Create Slide</v-card-title>
                                 <v-card-text>
                                     <v-text-field label="Title" v-model="formAboutCEO.title"></v-text-field>
                                     <v-text-field label="Subtitle" v-model="formAboutCEO.subtitle"></v-text-field>
                                     <v-text-field label="name ceo" v-model="formAboutCEO.name_ceo"></v-text-field>
                                     <v-text-field label="position ceo" v-model="formAboutCEO.position_ceo"></v-text-field>
                                    <v-file-input accept="image/*" v-model="formAboutCEO.image" label="Image"></v-file-input>
                                 </v-card-text>
                                 <v-card-actions>
                                     <v-btn color="blue darken-1" text @click="dialogAboutCEO = false">Close</v-btn>
                                     <v-btn color="blue darken-1" text @click="dialogAboutCEO = false; createAboutCEO()">
                                         Create</v-btn>
                                 </v-card-actions>
                             </v-card>
                         </v-dialog>
                     </v-toolbar>
                 </template>
            </v-data-table>
             <v-data-table :headers="headersProduct" :items="product">
                             <template v-slot:item.action="data">
                     <v-tooltip bottom>
                         <template v-slot:activator="{ on }">
                             <v-btn icon v-on="on" @click="editProduct(data.index)">
                                 <v-icon>mdi-pencil</v-icon>
                             </v-btn>
                         </template>
                         <span>Edit</span>
                     </v-tooltip>
                     <v-tooltip bottom>
                         <template v-slot:activator="{ on }">
                             <v-btn icon v-on="on" @click="hapusProduct(data.index)">
                                 <v-icon>mdi-delete</v-icon>
                             </v-btn>
                         </template>
                         <span>Delete</span>
                     </v-tooltip>
                 </template>
                 <template v-slot:top>
                     <v-toolbar flat>
                         <v-toolbar-title>Product </v-toolbar-title>
                         <v-spacer></v-spacer>
                         <v-dialog v-model="dialogProduct" max-width="500px">
                             <template v-slot:activator="{ on, attrs}">
                                 <v-btn color="primary" dark class="mb-2" v-bind="attrs" v-on="on">Create</v-btn>
                             </template>
                             <v-card>
                                 <v-card-title>Create Slide</v-card-title>
                                 <v-card-text>
                                     <v-text-field label="Title" v-model="formProduct.title"></v-text-field>
                                     <v-text-field label="Subtitle" v-model="formProduct.subtitle"></v-text-field>
                                 </v-card-text>
                                 <v-card-actions>
                                     <v-btn color="blue darken-1" text @click="dialogProduct = false">Close</v-btn>
                                     <v-btn color="blue darken-1" text @click="dialogProduct = false; createProduct()">
                                         Create</v-btn>
                                 </v-card-actions>
                             </v-card>
                         </v-dialog>
                     </v-toolbar>
                 </template>
             </v-data-table>
             <v-data-table :headers="headersPercentageProducts" :items="percentage_products">
                                          <template v-slot:item.action="data">
                     <v-tooltip bottom>
                         <template v-slot:activator="{ on }">
                             <v-btn icon v-on="on" @click="editPercentageProduct(data.index)">
                                 <v-icon>mdi-pencil</v-icon>
                             </v-btn>
                         </template>
                         <span>Edit</span>
                     </v-tooltip>
                     <v-tooltip bottom>
                         <template v-slot:activator="{ on }">
                             <v-btn icon v-on="on" @click="hapusPercentageProduct(data.index)">
                                 <v-icon>mdi-delete</v-icon>
                             </v-btn>
                         </template>
                         <span>Delete</span>
                     </v-tooltip>
                 </template>
                 <template v-slot:top>
                     <v-toolbar flat>
                         <v-toolbar-title>Percentage Product</v-toolbar-title>
                         <v-spacer></v-spacer>
                         <v-dialog v-model="dialogPercentageProducts" max-width="500px">
                             <template v-slot:activator="{ on, attrs}">
                                 <v-btn color="primary" dark class="mb-2" v-bind="attrs" v-on="on">Create</v-btn>
                             </template>
                             <v-card>
                                 <v-card-title>Create Slide</v-card-title>
                                 <v-card-text>
                                     <v-text-field label="Percentage" v-model="formPercentageProducts.percentage"></v-text-field>
                                     <v-text-field label="Products" v-model="formPercentageProducts.products"></v-text-field>
                                 </v-card-text>
                                 <v-card-actions>
                                     <v-btn color="blue darken-1" text @click="dialogPercentageProducts = false">Close</v-btn>
                                     <v-btn color="blue darken-1" text @click="dialogPercentageProducts = false; createPercentageProduct()">
                                         Create</v-btn>
                                 </v-card-actions>
                             </v-card>
                         </v-dialog>
                     </v-toolbar>
                 </template>
                </v-data-table>
             <v-data-table :headers="headersTeam" :items="team">
                                                       <template v-slot:item.action="data">
                     <v-tooltip bottom>
                         <template v-slot:activator="{ on }">
                             <v-btn icon v-on="on" @click="editTeam(data.index)">
                                 <v-icon>mdi-pencil</v-icon>
                             </v-btn>
                         </template>
                         <span>Edit</span>
                     </v-tooltip>
                     <v-tooltip bottom>
                         <template v-slot:activator="{ on }">
                             <v-btn icon v-on="on" @click="hapusTeam(data.index)">
                                 <v-icon>mdi-delete</v-icon>
                             </v-btn>
                         </template>
                         <span>Delete</span>
                     </v-tooltip>
                 </template>
                 <template v-slot:top>
                     <v-toolbar flat>
                         <v-toolbar-title>Header Team</v-toolbar-title>
                         <v-spacer></v-spacer>
                         <v-dialog v-model="dialogTeam" max-width="500px">
                             <template v-slot:activator="{ on, attrs}">
                                 <v-btn color="primary" dark class="mb-2" v-bind="attrs" v-on="on">Create</v-btn>
                             </template>
                             <v-card>
                                 <v-card-title>Create Slide</v-card-title>
                                 <v-card-text>
                                     <v-text-field label="Title" v-model="formTeam.title"></v-text-field>
                                     <v-text-field label="Subtitle" v-model="formTeam.subtitle"></v-text-field>
                                 </v-card-text>
                                 <v-card-actions>
                                     <v-btn color="blue darken-1" text @click="dialogTeam = false">Close</v-btn>
                                     <v-btn color="blue darken-1" text @click="dialogTeam = false; createTeam()">
                                         Create</v-btn>
                                 </v-card-actions>
                             </v-card>
                         </v-dialog>
                     </v-toolbar>
                 </template>
             </v-data-table>
             <v-data-table :headers="headersTeamDetail" :items="team_detail">
                <template v-slot:item.image="data">
                    <v-img
                        :src="'/images/about/team_detail/'+data.item.image"
                        :width="100"
                        :height="100"
                        class="mr-4"
                    ></v-img>                    
                </template>
                <template v-slot:item.action="data">
                     <v-tooltip bottom>
                         <template v-slot:activator="{ on }">
                             <v-btn icon v-on="on" @click="editTeamdetail(data.index)">
                                 <v-icon>mdi-pencil</v-icon>
                             </v-btn>
                         </template>
                         <span>Edit</span>
                     </v-tooltip>
                     <v-tooltip bottom>
                         <template v-slot:activator="{ on }">
                             <v-btn icon v-on="on" @click="hapusTeamdetail(data.index)">
                                 <v-icon>mdi-delete</v-icon>
                             </v-btn>
                         </template>
                         <span>Delete</span>
                     </v-tooltip>
                 </template>
                 <template v-slot:top>
                     <v-toolbar flat>
                         <v-toolbar-title>Team Detail</v-toolbar-title>
                         <v-spacer></v-spacer>
                         <v-dialog v-model="dialogTeamDetail" max-width="500px">
                             <template v-slot:activator="{ on, attrs}">
                                 <v-btn color="primary" dark class="mb-2" v-bind="attrs" v-on="on">Create</v-btn>
                             </template>
                             <v-card>
                                 <v-card-title>Create Slide</v-card-title>
                                 <v-card-text>
                                     <v-text-field label="Name" v-model="formTeamDetail.name"></v-text-field>
                                     <v-text-field label="Position" v-model="formTeamDetail.position"></v-text-field>
                                    <v-file-input accept="image/*" v-model="formTeamDetail.image" label="Image"></v-file-input>
                                 </v-card-text>
                                 <v-card-actions>
                                     <v-btn color="blue darken-1" text @click="dialogTeamDetail = false">Close</v-btn>
                                     <v-btn color="blue darken-1" text @click="dialogTeamDetail = false; createTeamdetail()">
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
            mission: [],
            dialogMission: false,
            headersmission: [
                { text: 'Id', value: 'id' },
                { text: 'Title', value: 'title' },
                { text: 'Subtitle', value: 'subtitle' },
                { text: 'Action', value: 'action'}
            ],
            formmission: {
                id: '',
                title: '',
                subtitle: '',
            },

            missioncontent: [],
            dialogMissionContent: false,
            headersmissioncontent: [
                { text: 'Mission Id', value: 'mission_id' },
                { text: 'Text', value: 'text' },
                { text: 'Action', value: 'action'}
            ],
            formmissioncontent: {
                id: '',
                mission_id: '',
                text: '',
            },

            about_ceo: [],
            dialogAboutCEO: false,
            headersAboutCEO: [
                { text: 'Image', value: 'image' },
                { text: 'Name Ceo', value: 'name_ceo' },
                { text: 'Position Ceo', value: 'position_ceo' },
                { text: 'Title', value: 'title' },
                { text: 'Subtitle', value: 'subtitle' },
                { text: 'Action', value: 'action'}
            ],
            formAboutCEO: {
                id: '',
                image: '',
                name_ceo: '',
                position_ceo: '',
                title: '',
                subtitle: '',
            },

            product: [],
            dialogProduct: false,
            headersProduct: [
                { text: 'Title', value: 'title' },
                { text: 'Subtitle', value: 'subtitle' },
                { text: 'Action', value: 'action'}
            ],
            formProduct: {
                id: '',
                title: '',
                subtitle: '',
            },

            percentage_products: [],
            dialogPercentageProducts: false,
            headersPercentageProducts: [
                { text: 'Percentage', value: 'percentage' },
                { text: 'Products', value: 'products' },
                { text: 'Action', value: 'action'}
            ],
            formPercentageProducts: {
                id: '',
                percentage: '',
                products: '',
            },

            team: [],
            dialogTeam: false,
            headersTeam: [
                { text: 'Title', value: 'title' },
                { text: 'Subtitle', value: 'subtitle' },
                { text: 'Action', value: 'action'}
            ],
            formTeam: {
                id: '',
                title: '',
                subtitle: '',
            },

            team_detail: [],
            dialogTeamDetail: false,
            headersTeamDetail: [
                { text: 'Image', value: 'image' },
                { text: 'Name', value: 'name' },
                { text: 'Position', value: 'position' },
                { text: 'Action', value: 'action'}
            ],
            formTeamDetail: {
                id: '',
                image: '',
                name: '',
                position: '',
            },
        }
    },
    methods: {
        async loadData() {
            await axios.get('/api/postAbout/missionKhusus').then(res => {
                this.mission = res.data
            })

            await axios.get('/api/postAbout/mission_contentKhusus').then(res => {
                this.missioncontent = res.data
            })

            await axios.get('/api/about/about_ceo').then(res => {
                this.about_ceo = res.data
            })

            await axios.get('/api/about/products').then(res => {
                this.product = res.data
            })

            await axios.get('/api/about/percentage_products').then(res => {
                this.percentage_products = res.data
            })

            await axios.get('/api/about/team').then(res => {
                this.team = res.data
            })

            await axios.get('/api/about/team_details').then(res => {
                this.team_detail = res.data
            })

            this.loading = false
        },
        createMission() {
            axios.post('/api/postAbout/mission', this.formmission).then(res => {
                this.loadData();
                this.formmission = {
                    id: '',
                    title: '',
                    subtitle: '',
                };
            })
        },
        editMission(mission) {
            this.formmission = this.mission[mission]
            this.dialogMission = true
        },
        hapusMission(mission) {
            axios.post('/api/postAbout/missionDelete', this.mission[mission]).then(res => {
                this.mission.splice(mission, 1);
            })
        },
        async createMissionContent() {
            await axios.post('/api/postAbout/mission_content', this.formmissioncontent).then(res => {
                this.loadData();
                this.formmissioncontent = {
                    id: '',
                    mission_id: '',
                    text: '',
                };
            })
        },
        editMissionContent(missioncontent) {
            this.formmissioncontent = this.missioncontent[missioncontent]
            this.dialogMissionContent = true
        },
        hapusMissionContent(missioncontent) {
            axios.post('/api/postAbout/mission_contentDelete', this.missioncontent[missioncontent]).then(res => {
                this.missioncontent.splice(missioncontent, 1);
            })
        },
        async createAboutCEO() {
            var formData = new FormData();
            formData.append('id', this.formAboutCEO.id);
            formData.append('image', this.formAboutCEO.image);
            formData.append('name_ceo', this.formAboutCEO.name_ceo);
            formData.append('position_ceo', this.formAboutCEO.position_ceo);
            formData.append('title', this.formAboutCEO.title);
            formData.append('subtitle', this.formAboutCEO.subtitle);
            await axios.post('/api/postAbout/about_ceo', formData).then(res => {
                this.loadData();
                this.formAboutCEO = {
                    id: '',
                    image: '',
                    name_ceo: '',
                    position_ceo: '',
                    title: '',
                    subtitle: '',
                };
            })
        },

        editAboutCEO(about_ceo) {
            this.formAboutCEO = this.about_ceo[about_ceo]
            this.dialogAboutCEO = true
        },

        hapusAboutCEO(about_ceo) {
            axios.post('/api/postAbout/about_ceoDelete', this.about_ceo[about_ceo]).then(res => {
                this.about_ceo.splice(about_ceo, 1);
            })
        },

        async createProduct(){
            await axios.post('/api/postAbout/products', this.formProduct).then(res => {
                this.loadData();
                this.formProduct = {
                    id: '',
                    title: '',
                    subtitle: '',
                };
            })
        },

        editProduct(product) {
            this.formProduct = this.product[product]
            this.dialogProduct = true
        },

        hapusProduct(product) {
            axios.post('/api/postAbout/productsDelete', this.product[product]).then(res => {
                this.product.splice(product, 1);
            })
        },

        async createPercentageProduct(){
            await axios.post('/api/postAbout/percentage_products', this.formPercentageProducts).then(res => {
                this.loadData();
                this.formPercentageProducts = {
                    id: '',
                    percentage: '',
                    products: '',
                };
            })
        },

        editPercentageProduct(percentage_products) {
            this.formPercentageProducts = this.percentage_products[percentage_products]
            this.dialogPercentageProducts = true
        },

        hapusPercentageProduct(percentage_products) {
            axios.post('/api/postAbout/percentage_productsDelete', this.percentage_products[percentage_products]).then(res => {
                this.percentage_products.splice(percentage_products, 1);
            })
        },

        createTeam() {
            axios.post('/api/postAbout/team', this.formTeam).then(res => {
                this.loadData();
                this.formTeam = {
                    id: '',
                    title: '',
                    subtitle: '',
                };
            })
        },

        editTeam(team) {
            this.formTeam = this.team[team]
            this.dialogTeam = true
        },
        hapusTeam(team) {
            axios.post('/api/postAbout/teamDelete', this.team[team]).then(res => {
                this.team.splice(team, 1);
            })
        },
        async createTeamdetail() {
            var formData = new FormData();
            formData.append('id', this.formTeamDetail.id);
            formData.append('image', this.formTeamDetail.image);
            formData.append('name', this.formTeamDetail.name);
            formData.append('position', this.formTeamDetail.position);
            await axios.post('/api/postAbout/team_details', formData).then(res => {
                this.loadData();
                this.formTeamDetail = {
                    id: '',
                    image: '',
                    name: '',
                    position: '',
                };
            })
        },

        editTeamdetail(team_detail) {
            this.formTeamDetail = this.team_detail[team_detail]
            this.dialogTeamDetail = true
        },

        hapusTeamdetail(team_detail) {
            axios.post('/api/postAbout/team_detailsDelete', this.team_detail[team_detail]).then(res => {
                this.team_detail.splice(team_detail, 1);
            })
        }
    },
    mounted() {
        this.loadData()
    },
 }
 </script>