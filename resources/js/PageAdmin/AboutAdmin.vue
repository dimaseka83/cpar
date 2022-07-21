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
                                     </v-file-input>
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
             <v-data-table :headers="about_ceo" :items="headersAboutCEO"></v-data-table>
             <v-data-table :headers="headersProduct" :items="product"></v-data-table>
             <v-data-table :headers="headersPercentageProducts" :items="percentage_products"></v-data-table>
             <v-data-table :headers="headersTeam" :items="team"></v-data-table>
             <v-data-table :headers="headersTeamDetail" :items="team_detail"></v-data-table>
 
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

            about_ceo: {},
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
    },
    mounted() {
        this.loadData()
    },
 }
 </script>