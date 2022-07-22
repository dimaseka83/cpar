<template>
    <v-app>
        <v-card class="my-16">
            <v-data-table :headers="headerspartnerlogo" :items="partner_logo">
                <template v-slot:item.image="data">
                    <v-img
                        :src="'/images/quality/partner_logo/'+data.item.image"
                        :width="100"
                        :height="100"
                        class="mr-4"
                    ></v-img>                    
                </template>
                <template v-slot:item.action="data">
                     <v-tooltip bottom>
                         <template v-slot:activator="{ on }">
                             <v-btn icon v-on="on" @click="editPartnerLogo(data.index)">
                                 <v-icon>mdi-pencil</v-icon>
                             </v-btn>
                         </template>
                         <span>Edit</span>
                     </v-tooltip>
                     <v-tooltip bottom>
                         <template v-slot:activator="{ on }">
                             <v-btn icon v-on="on" @click="hapusPartnerLogo(data.index)">
                                 <v-icon>mdi-delete</v-icon>
                             </v-btn>
                         </template>
                         <span>Delete</span>
                     </v-tooltip>
                 </template>
                <template v-slot:top>
                    <v-toolbar flat>
                        <v-toolbar-title>Partner Logo <span class="subtitle-2 text--disabled">(Gambar harus HD)</span>
                        </v-toolbar-title>
                        <v-spacer></v-spacer>
                        <v-dialog v-model="dialogpartnerlogo" max-width="500px">
                            <template v-slot:activator="{ on, attrs}">
                                <v-btn color="primary" dark class="mb-2" v-bind="attrs" v-on="on">Create</v-btn>
                            </template>
                            <v-card>
                                <v-card-title>Create Slide</v-card-title>
                                <v-card-text>
                                    <v-file-input accept="image/*" v-model="formpartnerlogo.image" label="Image"></v-file-input>
                                </v-card-text>
                                <v-card-actions>
                                    <v-btn color="blue darken-1" text @click="dialogpartnerlogo = false">Close</v-btn>
                                    <v-btn color="blue darken-1" text @click="dialogpartnerlogo = false; createPartnerLogo()">Create</v-btn>
                                </v-card-actions>
                            </v-card>
                        </v-dialog>
                    </v-toolbar>
                </template>
            </v-data-table>
            <v-data-table :headers="headersoursocial" :items="our_social">
            <template v-slot:item.action="data">
                     <v-tooltip bottom>
                         <template v-slot:activator="{ on }">
                             <v-btn icon v-on="on" @click="editOurSocial(data.index)">
                                 <v-icon>mdi-pencil</v-icon>
                             </v-btn>
                         </template>
                         <span>Edit</span>
                     </v-tooltip>
                     <v-tooltip bottom>
                         <template v-slot:activator="{ on }">
                             <v-btn icon v-on="on" @click="hapusOurSocial(data.index)">
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
                        <v-dialog v-model="dialogoursocial" max-width="500px">
                            <template v-slot:activator="{ on, attrs}">
                                <v-btn color="primary" dark class="mb-2" v-bind="attrs" v-on="on">Create</v-btn>
                            </template>
                            <v-card>
                                <v-card-title>Create Slide</v-card-title>
                                <v-card-text>
                                    <v-text-field label="Title" v-model="formoursocial.title"></v-text-field>
                                    <v-text-field label="Subtitle" v-model="formoursocial.subtitle"></v-text-field>
                                </v-card-text>
                                <v-card-actions>
                                    <v-btn color="blue darken-1" text @click="dialogoursocial = false">Close</v-btn>
                                    <v-btn color="blue darken-1" text @click="dialogoursocial = false; createOurSocial()">Create</v-btn>
                                </v-card-actions>
                            </v-card>
                        </v-dialog>
                    </v-toolbar>
                </template>
            </v-data-table>
            <v-data-table :headers="headersourcertifications" :items="ourcertifications">
                        <template v-slot:item.action="data">
                     <v-tooltip bottom>
                         <template v-slot:activator="{ on }">
                             <v-btn icon v-on="on" @click="editOurCertifications(data.index)">
                                 <v-icon>mdi-pencil</v-icon>
                             </v-btn>
                         </template>
                         <span>Edit</span>
                     </v-tooltip>
                     <v-tooltip bottom>
                         <template v-slot:activator="{ on }">
                             <v-btn icon v-on="on" @click="hapusOurCertifications(data.index)">
                                 <v-icon>mdi-delete</v-icon>
                             </v-btn>
                         </template>
                         <span>Delete</span>
                     </v-tooltip>
                 </template>
                <template v-slot:top>
                    <v-toolbar flat>
                        <v-toolbar-title>Our Certifications 
                        </v-toolbar-title>
                        <v-spacer></v-spacer>
                        <v-dialog v-model="dialogourcertifications" max-width="500px">
                            <template v-slot:activator="{ on, attrs}">
                                <v-btn color="primary" dark class="mb-2" v-bind="attrs" v-on="on">Create</v-btn>
                            </template>
                            <v-card>
                                <v-card-title>Create Slide</v-card-title>
                                <v-card-text>
                                    <v-text-field label="Title" v-model="formourcertifications.title"></v-text-field>
                                    <v-text-field label="Subtitle" v-model="formourcertifications.subtitle"></v-text-field>
                                </v-card-text>
                                <v-card-actions>
                                    <v-btn color="blue darken-1" text @click="dialogourcertifications = false">Close</v-btn>
                                    <v-btn color="blue darken-1" text @click="dialogourcertifications = false; createOurCertifications()">Create</v-btn>
                                </v-card-actions>
                            </v-card>
                        </v-dialog>
                    </v-toolbar>
                </template>
            </v-data-table>
<v-data-table :headers="headerscertificationlogo" :items="certification_logo">
                <template v-slot:item.image="data">
                    <v-img
                        :src="'/images/quality/certification_logo/'+data.item.image"
                        :width="100"
                        :height="100"
                        class="mr-4"
                    ></v-img>                    
                </template>
                <template v-slot:item.action="data">
                     <v-tooltip bottom>
                         <template v-slot:activator="{ on }">
                             <v-btn icon v-on="on" @click="editCertificationLogo(data.index)">
                                 <v-icon>mdi-pencil</v-icon>
                             </v-btn>
                         </template>
                         <span>Edit</span>
                     </v-tooltip>
                     <v-tooltip bottom>
                         <template v-slot:activator="{ on }">
                             <v-btn icon v-on="on" @click="hapusCertificationLogo(data.index)">
                                 <v-icon>mdi-delete</v-icon>
                             </v-btn>
                         </template>
                         <span>Delete</span>
                     </v-tooltip>
                 </template>
                <template v-slot:top>
                    <v-toolbar flat>
                        <v-toolbar-title>Certification Logo <span class="subtitle-2 text--disabled">(Gambar harus HD)</span>
                        </v-toolbar-title>
                        <v-spacer></v-spacer>
                        <v-dialog v-model="dialogcertificationlogo" max-width="500px">
                            <template v-slot:activator="{ on, attrs}">
                                <v-btn color="primary" dark class="mb-2" v-bind="attrs" v-on="on">Create</v-btn>
                            </template>
                            <v-card>
                                <v-card-title>Create Slide</v-card-title>
                                <v-card-text>
                                    <v-file-input accept="image/*" v-model="formcertificationlogo.image" label="Image"></v-file-input>
                                </v-card-text>
                                <v-card-actions>
                                    <v-btn color="blue darken-1" text @click="dialogcertificationlogo = false">Close</v-btn>
                                    <v-btn color="blue darken-1" text @click="dialogcertificationlogo = false; createCertificationLogo()">Create</v-btn>
                                </v-card-actions>
                            </v-card>
                        </v-dialog>
                    </v-toolbar>
                </template>
</v-data-table>
            <v-data-table :headers="headersstrictpage" :items="strictpage">
                                                <template v-slot:item.action="data">
                     <v-tooltip bottom>
                         <template v-slot:activator="{ on }">
                             <v-btn icon v-on="on" @click="editStrictPage(data.index)">
                                 <v-icon>mdi-pencil</v-icon>
                             </v-btn>
                         </template>
                         <span>Edit</span>
                     </v-tooltip>
                     <v-tooltip bottom>
                         <template v-slot:activator="{ on }">
                             <v-btn icon v-on="on" @click="hapusStrictPage(data.index)">
                                 <v-icon>mdi-delete</v-icon>
                             </v-btn>
                         </template>
                         <span>Delete</span>
                     </v-tooltip>
                 </template>
                <template v-slot:top>
                    <v-toolbar flat>
                        <v-toolbar-title>Strict Page
                        </v-toolbar-title>
                        <v-spacer></v-spacer>
                        <v-dialog v-model="dialogstrictpage" max-width="500px">
                            <template v-slot:activator="{ on, attrs}">
                                <v-btn color="primary" dark class="mb-2" v-bind="attrs" v-on="on">Create</v-btn>
                            </template>
                            <v-card>
                                <v-card-title>Create Slide</v-card-title>
                                <v-card-text>
                                    <v-text-field label="Title" v-model="formstrictpage.title"></v-text-field>
                                    <v-text-field label="Subtitle" v-model="formstrictpage.subtitle"></v-text-field>
                                </v-card-text>
                                <v-card-actions>
                                    <v-btn color="blue darken-1" text @click="dialogstrictpage = false">Close</v-btn>
                                    <v-btn color="blue darken-1" text @click="dialogstrictpage = false; createStrictPage()">Create</v-btn>
                                </v-card-actions>
                            </v-card>
                        </v-dialog>
                    </v-toolbar>
                </template>

            </v-data-table>
            <v-data-table :headers="headersstrictlogo" :items="strict_logo">
                                    <template v-slot:item.image="data">
                    <v-img
                        :src="'/images/quality/strict_logo/'+data.item.image"
                        :width="100"
                        :height="100"
                        class="mr-4"
                    ></v-img>                    
                </template>
                                        <template v-slot:item.action="data">
                     <v-tooltip bottom>
                         <template v-slot:activator="{ on }">
                             <v-btn icon v-on="on" @click="editStrictLogo(data.index)">
                                 <v-icon>mdi-pencil</v-icon>
                             </v-btn>
                         </template>
                         <span>Edit</span>
                     </v-tooltip>
                     <v-tooltip bottom>
                         <template v-slot:activator="{ on }">
                             <v-btn icon v-on="on" @click="hapusStrictLogo(data.index)">
                                 <v-icon>mdi-delete</v-icon>
                             </v-btn>
                         </template>
                         <span>Delete</span>
                     </v-tooltip>
                 </template>
                <template v-slot:top>
                    <v-toolbar flat>
                        <v-toolbar-title>Strict Logo
                        </v-toolbar-title>
                        <v-spacer></v-spacer>
                        <v-dialog v-model="dialogstrictlogo" max-width="500px">
                            <template v-slot:activator="{ on, attrs}">
                                <v-btn color="primary" dark class="mb-2" v-bind="attrs" v-on="on">Create</v-btn>
                            </template>
                            <v-card>
                                <v-card-title>Create Slide</v-card-title>
                                <v-card-text>
                                    <v-file-input accept="image/*" v-model="formstrictlogo.image" label="Image"></v-file-input>
                                </v-card-text>
                                <v-card-actions>
                                    <v-btn color="blue darken-1" text @click="dialogstrictlogo = false">Close</v-btn>
                                    <v-btn color="blue darken-1" text @click="dialogstrictlogo = false; createStrictLogo()">Create</v-btn>
                                </v-card-actions>
                            </v-card>
                        </v-dialog>
                    </v-toolbar>
                </template>
            </v-data-table>
            <v-data-table :headers="headersqc" :items="headqc">
            <template v-slot:item.image="data">
                    <v-img
                        :src="'/images/quality/headqc/'+data.item.image"
                        :width="100"
                        :height="100"
                        class="mr-4"
                    ></v-img>                    
                </template>
                                                        <template v-slot:item.action="data">
                     <v-tooltip bottom>
                         <template v-slot:activator="{ on }">
                             <v-btn icon v-on="on" @click="editqc(data.index)">
                                 <v-icon>mdi-pencil</v-icon>
                             </v-btn>
                         </template>
                         <span>Edit</span>
                     </v-tooltip>
                     <v-tooltip bottom>
                         <template v-slot:activator="{ on }">
                             <v-btn icon v-on="on" @click="hapusqc(data.index)">
                                 <v-icon>mdi-delete</v-icon>
                             </v-btn>
                         </template>
                         <span>Delete</span>
                     </v-tooltip>
                 </template>
                <template v-slot:top>
                    <v-toolbar flat>
                        <v-toolbar-title>QC</v-toolbar-title>
                        <v-spacer></v-spacer>
                        <v-dialog v-model="dialogqc" max-width="500px">
                            <template v-slot:activator="{ on, attrs}">
                                <v-btn color="primary" dark class="mb-2" v-bind="attrs" v-on="on">Create</v-btn>
                            </template>
                            <v-card>
                                <v-card-title>Create Slide</v-card-title>
                                <v-card-text>
                                    <v-text-field label="Title" v-model="formqc.title"></v-text-field>
                                    <v-text-field label="Name" v-model="formqc.name"></v-text-field>
                                    <v-file-input accept="image/*" v-model="formqc.image" label="Image"></v-file-input>
                                </v-card-text>
                                <v-card-actions>
                                    <v-btn color="blue darken-1" text @click="dialogqc = false">Close</v-btn>
                                    <v-btn color="blue darken-1" text @click="dialogqc = false; createqc()">Create</v-btn>
                                </v-card-actions>
                            </v-card>
                        </v-dialog>
                    </v-toolbar>
                </template>
            </v-data-table>
            <v-data-table :headers="headersemail" :items="heademail">
                                                            <template v-slot:item.action="data">
                     <v-tooltip bottom>
                         <template v-slot:activator="{ on }">
                             <v-btn icon v-on="on" @click="editEmail(data.index)">
                                 <v-icon>mdi-pencil</v-icon>
                             </v-btn>
                         </template>
                         <span>Edit</span>
                     </v-tooltip>
                     <v-tooltip bottom>
                         <template v-slot:activator="{ on }">
                             <v-btn icon v-on="on" @click="hapusEmail(data.index)">
                                 <v-icon>mdi-delete</v-icon>
                             </v-btn>
                         </template>
                         <span>Delete</span>
                     </v-tooltip>
                 </template>
                <template v-slot:top>
                    <v-toolbar flat>
                        <v-toolbar-title>Strict Page
                        </v-toolbar-title>
                        <v-spacer></v-spacer>
                        <v-dialog v-model="dialogemail" max-width="500px">
                            <template v-slot:activator="{ on, attrs}">
                                <v-btn color="primary" dark class="mb-2" v-bind="attrs" v-on="on">Create</v-btn>
                            </template>
                            <v-card>
                                <v-card-title>Create Slide</v-card-title>
                                <v-card-text>
                                    <v-text-field label="Title" v-model="formemail.title"></v-text-field>
                                    <v-text-field label="Subtitle" v-model="formemail.subtitle"></v-text-field>
                                </v-card-text>
                                <v-card-actions>
                                    <v-btn color="blue darken-1" text @click="dialogemail = false">Close</v-btn>
                                    <v-btn color="blue darken-1" text @click="dialogemail = false; createEmail()">Create</v-btn>
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
            partner_logo: [],
            dialogpartnerlogo: false,
            headerspartnerlogo: [
                { text: 'Image', value: 'image' },
                { text: 'Action', value: 'action' },
            ],
            formpartnerlogo: {
                id: '',
                image: '',
            },

            our_social:[],
            dialogoursocial: false,
            headersoursocial: [
                { text: 'Title', value: 'title' },
                { text: 'Subtitle', value: 'subtitle' },
                { text: 'Action', value: 'action' },
            ],
            formoursocial: {
                id: '',
                title: '',
                subtitle: '',
            },

            ourcertifications: [],
            dialogourcertifications: false,
            headersourcertifications: [
                { text: 'Title', value: 'title' },
                { text: 'Subtitle', value: 'subtitle' },
                { text: 'Action', value: 'action' },
            ],
            formourcertifications: {
                id: '',
                title: '',
                subtitle: '',
            },
            
            certification_logo: [],
            dialogcertificationlogo: false,
            headerscertificationlogo: [
                { text: 'Image', value: 'image' },
                { text: 'Action', value: 'action' },
            ],
            formcertificationlogo: {
                id: '',
                image: '',
            },

            certification: [],
            dialogcertification: false,
            headerscertification: [
                { text: 'Image', value: 'image' },
                { text: 'Title', value: 'title' },
                { text: 'Subtitle', value: 'subtitle' },
                { text: 'Action', value: 'action' },
            ],
            formcertification: {
                id: '',
                image: '',
                title: '',
                subtitle: '',
            },
            
            strictpage: [],
            dialogstrictpage: false,
            headersstrictpage: [
                { text: 'Title', value: 'title' },
                { text: 'Subtitle', value: 'subtitle' },
                { text: 'Action', value: 'action' },
            ],
            formstrictpage: {
                id: '',
                title: '',
                subtitle: '',
            },

            strict_logo: [],
            dialogstrictlogo: false,
            headersstrictlogo: [
                { text: 'Image', value: 'image' },
                { text: 'Action', value: 'action' },
            ],
            formstrictlogo: {
                id: '',
                image: '',
            },
            headqc:[],
            dialogqc: false,
            headersqc: [
                { text: 'Image', value: 'image' },
                { text: 'Name', value: 'name' },
                { text: 'Title', value: 'title' },
                { text: 'Action', value: 'action' },
            ],
            formqc: {
                id: '',
                image: '',
                name: '',
                title: '',
            },
            
            heademail: [],
            dialogemail: false,
            headersemail: [
                { text: 'Title', value: 'title' },
                { text: 'Subtitle', value: 'subtitle' },
                { text: 'Action', value: 'action' },
            ],
            formemail: {
                id: '',
                title: '',
                subtitle: '',
            },
        }
    },

    methods: {
        async loadData(){
            await axios.get('/api/quality/partner_logo').then(res => {
                this.partner_logo = res.data
            })

            await axios.get('/api/quality/our_social').then(res => {
                this.our_social = res.data
            })

            await axios.get('/api/quality/ourcertifications').then(res => {
                this.ourcertifications = res.data
            })

            await axios.get('/api/quality/certification_logo').then(res => {
                this.certification_logo = res.data
            })

            await axios.get('/api/quality/certification').then(res => {
                this.certification = res.data
            })

            await axios.get('/api/quality/strictpage').then(res => {
                this.strictpage = res.data
            })

            await axios.get('/api/quality/strict_logo').then(res => {
                this.strict_logo = res.data
            })

            await axios.get('/api/quality/headqc').then(res => {
                this.headqc = res.data
            })

            await axios.get('/api/quality/heademail').then(res => {
                this.heademail = res.data
            })

        },
        async createPartnerLogo(){
            var formData = new FormData();
            formData.append('id', this.formpartnerlogo.id);
            formData.append('image', this.formpartnerlogo.image);
            await axios.post('/api/postQuality/partner_logo', formData).then(res => {
                this.loadData()
                this.formpartnerlogo = {
                    id: '',
                    image: '',
                }
            });
        },
        editPartnerLogo(item){
            this.formpartnerlogo = this.partner_logo[item]
            this.dialogpartnerlogo = true
        },
        async hapusPartnerLogo(index){
            await axios.post('/api/postQuality/hapus_partner_logo', this.partner_logo[index]).then(res => {
                this.partner_logo.splice(index, 1)
            });
        },

        async createOurSocial(){
            await axios.post('/api/postQuality/our_social', this.formoursocial).then(res => {
                this.loadData()
                this.formoursocial = {
                    id: '',
                    title: '',
                    subtitle: '',
                }
            });
        },

        editOurSocial(item){
            this.formoursocial = this.our_social[item]
            this.dialogoursocial = true
        },

        async hapusOurSocial(index){
            await axios.post('/api/postQuality/hapus_our_social', this.our_social[index]).then(res => {
                this.our_social.splice(index, 1)
            });
        },

        async createOurCertifications(){
            await axios.post('/api/postQuality/ourcertifications', this.formourcertifications).then(res => {
                this.loadData()
                this.formourcertifications = {
                    id: '',
                    title: '',
                    subtitle: '',
                }
            });
        },

        editOurCertifications(item){
            this.formourcertifications = this.ourcertifications[item]
            this.dialogourcertifications = true
        },

        async hapusOurCertifications(index){
            await axios.post('/api/postQuality/hapus_our_certifications', this.ourcertifications[index]).then(res => {
                this.ourcertifications.splice(index, 1)
            });
        },

        async createCertificationLogo(){
            var formData = new FormData();
            formData.append('id', this.formcertificationlogo.id);
            formData.append('image', this.formcertificationlogo.image);
            await axios.post('/api/postQuality/certification_logo', formData).then(res => {
                this.loadData()
                this.formcertificationlogo = {
                    id: '',
                    image: '',
                }
            });
        },

        editCertificationLogo(item){
            this.formcertificationlogo = this.certification_logo[item]
            this.dialogcertificationlogo = true
        },

        async hapusCertificationLogo(index){
            await axios.post('/api/postQuality/hapus_certification_logo', this.certification_logo[index]).then(res => {
                this.certification_logo.splice(index, 1)
            });
        },
        
        async createStrictPage(){
            await axios.post('/api/postQuality/strictpage', this.formstrictpage).then(res => {
                this.loadData()
                this.formstrictpage = {
                    id: '',
                    title: '',
                    subtitle: '',
                }
            });
        },

        editStrictPage(item){
            this.formstrictpage = this.strictpage[item]
            this.dialogstrictpage = true
        },

        async hapusStrictPage(index){
            await axios.post('/api/postQuality/hapus_strict_page', this.strictpage[index]).then(res => {
                this.strictpage.splice(index, 1)
            });
        },

        async createStrictLogo(){
            var formData = new FormData();
            formData.append('id', this.formstrictlogo.id);
            formData.append('image', this.formstrictlogo.image);
            await axios.post('/api/postQuality/strict_logo', formData).then(res => {
                this.loadData()
                this.formstrictlogo = {
                    id: '',
                    image: '',
                }
            });
        },

        editStrictLogo(item){
            this.formstrictlogo = this.strict_logo[item]
            this.dialogstrictlogo = true
        },

        async hapusStrictLogo(index){
            await axios.post('/api/postQuality/hapus_strict_logo', this.strict_logo[index]).then(res => {
                this.strict_logo.splice(index, 1)
            });
        },

        async createqc(){
            var formData = new FormData();
            formData.append('id', this.formqc.id);
            formData.append('image', this.formqc.image);
            formData.append('name', this.formqc.name);
            formData.append('title', this.formqc.title);
            
            await axios.post('/api/postQuality/headqc', formData).then(res => {
                this.loadData()
                this.formqc = {
                    id: '',
                    image: '',
                    name: '',
                    title: '',
                }
            });
        },

        editqc(item){
            this.formqc = this.headqc[item]
            this.dialogqc = true
        },

        async hapusqc(index){
            await axios.post('/api/postQuality/hapus_qc', this.headqc[index]).then(res => {
                this.headqc.splice(index, 1)
            });
        },

        async createEmail(){
            await axios.post('/api/postQuality/heademail', this.formemail).then(res => {
                this.loadData()
                this.formemail = {
                    id: '',
                    title: '',
                    subtitle: '',
                }
            });
        },

        editEmail(item){
            this.formemail = this.heademail[item]
            this.dialogemail = true
        },

        async hapusEmail(index){
            await axios.post('/api/postQuality/hapus_email', this.heademail[index]).then(res => {
                this.heademail.splice(index, 1)
            });
        },

    },
        mounted() {
        this.loadData()
    }
}
</script>