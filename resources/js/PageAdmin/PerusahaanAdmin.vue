<template>
    <v-app>
        <v-card class="my-16">
            <v-data-table :headers="headersperusahaan" :items="perusahaan">
                <template v-slot:item.action="data">
                    <v-tooltip bottom>
                        <template v-slot:activator="{ on }">
                            <v-btn icon v-on="on" @click="editPerusahaan(data.index)">
                                <v-icon>mdi-pencil</v-icon>
                            </v-btn>
                        </template>
                        <span>Edit</span>
                    </v-tooltip>
                    <v-tooltip bottom>
                        <template v-slot:activator="{ on }">
                            <v-btn icon v-on="on" @click="hapusPerusahaan(data.index)">
                                <v-icon>mdi-delete</v-icon>
                            </v-btn>
                        </template>
                        <span>Delete</span>
                    </v-tooltip>
                </template>
                <template v-slot:top>
                    <v-toolbar flat>
                        <v-toolbar-title>Perusahaan</v-toolbar-title>
                        <v-spacer></v-spacer>
                        <v-dialog v-model="dialogperusahaan" max-width="500px">
                            <template v-slot:activator="{ on, attrs}">
                                <v-btn color="primary" dark class="mb-2" v-bind="attrs" v-on="on">Create</v-btn>
                            </template>
                            <v-card>
                                <v-card-title>Create Slide</v-card-title>
                                <v-card-text>
                                    <v-text-field v-model="formsperusahaan.open_day" label="Open Day" required>
                                    </v-text-field>
                                    <v-text-field v-model="formsperusahaan.open_hour" label="Open Hour" required>
                                    </v-text-field>
                                    <v-text-field v-model="formsperusahaan.phone" label="Phone" required>
                                    </v-text-field>
                                </v-card-text>
                                <v-card-actions>
                                    <v-btn color="blue darken-1" text @click="dialogperusahaan = false">Close</v-btn>
                                    <v-btn color="blue darken-1" text
                                        @click="dialogperusahaan = false; createPerusahaan()">
                                        Create</v-btn>
                                </v-card-actions>
                            </v-card>
                        </v-dialog>
                    </v-toolbar>
                </template>
            </v-data-table>
            <v-data-table :headers="headerscontact" :items="contact">
                <template v-slot:item.icon="data">
                    <v-icon>{{ data.item.icon }}</v-icon>
                </template>
                <template v-slot:item.action="data">
                    <v-tooltip bottom>
                        <template v-slot:activator="{ on }">
                            <v-btn icon v-on="on" @click="editContact(data.index)">
                                <v-icon>mdi-pencil</v-icon>
                            </v-btn>
                        </template>
                        <span>Edit</span>
                    </v-tooltip>
                    <v-tooltip bottom>
                        <template v-slot:activator="{ on }">
                            <v-btn icon v-on="on" @click="hapusContact(data.index)">
                                <v-icon>mdi-delete</v-icon>
                            </v-btn>
                        </template>
                        <span>Delete</span>
                    </v-tooltip>
                </template>
                <template v-slot:top>
                    <v-toolbar flat>
                        <v-toolbar-title>Contact Perusahaan</v-toolbar-title>
                        <v-spacer></v-spacer>
                        <v-dialog v-model="dialogcontact" max-width="500px">
                            <template v-slot:activator="{ on, attrs}">
                                <v-btn color="primary" dark class="mb-2" v-bind="attrs" v-on="on">Create</v-btn>
                            </template>
                            <v-card>
                                <v-card-title>Create Slide</v-card-title>
                                <v-card-text>
                                    <v-text-field v-model="formscontact.icon" label="Icon" required>
                                    </v-text-field>
                                    <v-text-field v-model="formscontact.text" label="Text" required>
                                    </v-text-field>
                                </v-card-text>
                                <v-card-actions>
                                    <v-btn color="blue darken-1" text @click="dialogcontact = false">Close</v-btn>
                                    <v-btn color="blue darken-1" text @click="dialogcontact = false; createContact()">
                                        Create</v-btn>
                                </v-card-actions>
                            </v-card>
                        </v-dialog>
                    </v-toolbar>
                </template>
            </v-data-table>
            <v-data-table :headers="headerssocialmedia" :items="social_media">
                <template v-slot:item.icon="data">
                    <v-icon>{{ data.item.icon }}</v-icon>
                </template>
                <template v-slot:item.action="data">
                    <v-tooltip bottom>
                        <template v-slot:activator="{ on }">
                            <v-btn icon v-on="on" @click="editSocialMedia(data.index)">
                                <v-icon>mdi-pencil</v-icon>
                            </v-btn>
                        </template>
                        <span>Edit</span>
                    </v-tooltip>
                    <v-tooltip bottom>
                        <template v-slot:activator="{ on }">
                            <v-btn icon v-on="on" @click="hapusSocialMedia(data.index)">
                                <v-icon>mdi-delete</v-icon>
                            </v-btn>
                        </template>
                        <span>Delete</span>
                    </v-tooltip>
                </template>
                <template v-slot:top>
                    <v-toolbar flat>
                        <v-toolbar-title>Link Perusahaan</v-toolbar-title>
                        <v-spacer></v-spacer>
                        <v-dialog v-model="dialogsocialmedia" max-width="500px">
                            <template v-slot:activator="{ on, attrs}">
                                <v-btn color="primary" dark class="mb-2" v-bind="attrs" v-on="on">Create</v-btn>
                            </template>
                            <v-card>
                                <v-card-title>Create Slide</v-card-title>
                                <v-card-text>
                                    <v-text-field v-model="formssocialmedia.icon" label="Icon" required>
                                    </v-text-field>
                                    <v-text-field v-model="formssocialmedia.link" label="Text" required>
                                    </v-text-field>
                                </v-card-text>
                                <v-card-actions>
                                    <v-btn color="blue darken-1" text @click="dialogsocialmedia = false">Close</v-btn>
                                    <v-btn color="blue darken-1" text
                                        @click="dialogsocialmedia = false; createSocialMedia()">
                                        Create</v-btn>
                                </v-card-actions>
                            </v-card>
                        </v-dialog>
                    </v-toolbar>
                </template>
            </v-data-table>
            <v-data-table :headers="headersfooter" :items="footer">
                <template v-slot:item.action="data">
                    <v-tooltip bottom>
                        <template v-slot:activator="{ on }">
                            <v-btn icon v-on="on" @click="editFooter(data.index)">
                                <v-icon>mdi-pencil</v-icon>
                            </v-btn>
                        </template>
                        <span>Edit</span>
                    </v-tooltip>
                    <v-tooltip bottom>
                        <template v-slot:activator="{ on }">
                            <v-btn icon v-on="on" @click="hapusFooter(data.index)">
                                <v-icon>mdi-delete</v-icon>
                            </v-btn>
                        </template>
                        <span>Delete</span>
                    </v-tooltip>
                </template>
                <template v-slot:top>
                    <v-toolbar flat>
                        <v-toolbar-title>Footer</v-toolbar-title>
                        <v-spacer></v-spacer>
                        <v-dialog v-model="dialogfooter" max-width="500px">
                            <template v-slot:activator="{ on, attrs}">
                                <v-btn color="primary" dark class="mb-2" v-bind="attrs" v-on="on">Create</v-btn>
                            </template>
                            <v-card>
                                <v-card-title>Create Slide</v-card-title>
                                <v-card-text>
                                    <v-text-field v-model="formsfooter.text" label="Text" required>
                                    </v-text-field>
                                </v-card-text>
                                <v-card-actions>
                                    <v-btn color="blue darken-1" text @click="dialogfooter = false">Close</v-btn>
                                    <v-btn color="blue darken-1" text @click="dialogfooter = false; createFooter()">
                                        Create</v-btn>
                                </v-card-actions>
                            </v-card>
                        </v-dialog>
                    </v-toolbar>
                </template>
            </v-data-table>
            <v-data-table :headers="headerspesan" :items="pesan">
                <template v-slot:item.action="data">
                    <v-tooltip bottom>
                        <template v-slot:activator="{ on }">
                            <v-btn icon v-on="on" @click="editPesan(data.index)">
                                <v-icon>mdi-pencil</v-icon>
                            </v-btn>
                        </template>
                        <span>Edit</span>
                    </v-tooltip>
                    <v-tooltip bottom>
                        <template v-slot:activator="{ on }">
                            <v-btn icon v-on="on" @click="hapusPesan(data.index)">
                                <v-icon>mdi-delete</v-icon>
                            </v-btn>
                        </template>
                        <span>Delete</span>
                    </v-tooltip>
                </template>
                <template v-slot:top>
                    <v-toolbar flat>
                        <v-toolbar-title>Email</v-toolbar-title>
                        <v-spacer></v-spacer>
                        <v-dialog v-model="dialogpesan" max-width="500px">
                            <template v-slot:activator="{ on, attrs}">
                                <v-btn color="primary" dark class="mb-2" v-bind="attrs" v-on="on">Create</v-btn>
                            </template>
                            <v-card>
                                <v-card-title>Create Slide</v-card-title>
                                <v-card-text>
                                    <v-text-field v-model="formspesan.name" label="Name" required></v-text-field>
                                    <v-text-field v-model="formspesan.email" label="email" required></v-text-field>
                                    <v-text-field v-model="formspesan.pesan" label="pesan" required></v-text-field>
                                </v-card-text>
                                <v-card-actions>
                                    <v-btn color="blue darken-1" text @click="dialogpesan = false">Close</v-btn>
                                    <v-btn color="blue darken-1" text @click="dialogpesan = false; createPesan()">
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
            perusahaan: [],
            dialogperusahaan: false,
            headersperusahaan: [
                { text: 'Open Day', value: 'open_day' }, 
                { text: 'Open Hour', value: 'open_hour' },
                { text: 'Phone', value: 'phone' },
                { text: 'Action', value: 'action' },
            ],
            formsperusahaan: {
                id: '',
                open_day: '',
                open_hour: '',
                phone: '',
            },

            contact: [],
            dialogcontact: false,
            headerscontact: [
                { text: 'Icon', value: 'icon' }, 
                { text: 'Text', value: 'text' },
                { text: 'Aksi', value: 'action' },
            ],
            formscontact: {
                id: '',
                icon: '',
                text: '',
            },

            social_media: [],
            dialogsocialmedia: false,
            headerssocialmedia: [
                { text: 'Icon', value: 'icon' }, 
                { text: 'Link', value: 'link' },
                { text: 'Aksi', value: 'action' },
            ],
            formssocialmedia: {
                id: '',
                icon: '',
                link: '',
            },

            footer: [],
            dialogfooter: false,
            headersfooter: [
                { text: 'Text', value: 'text' },
                { text: 'Aksi', value: 'action' },
            ],
            formsfooter: {
                id: '',
                text: '',
            },

            pesan: [],
            dialogpesan: false,
            headerspesan: [
                { text: 'Nama', value: 'name' }, 
                { text: 'Email', value: 'email' },
                { text: 'Pesan', value: 'pesan' },
                { text: 'Aksi', value: 'action' },
            ],
            formspesan: {
                id: '',
                name: '',
                email: '',
                pesan: '',
            },
        }
    },
    methods: {
        async loadData() {
            await axios.get('/api/company/perusahaan').then(response => {
                this.perusahaan = response.data;
            })

            await axios.get('/api/company/contact').then(response => {
                this.contact = response.data;
            })

            await axios.get('/api/company/social_media').then(response => {
                this.social_media = response.data;
            })

            await axios.get('/api/company/detailFooter').then(response => {
                this.footer = response.data;
            })

            await axios.get('/api/company/pesan').then(response => {
                this.pesan = response.data;
            })
        },
        async createPerusahaan() {
            await axios.post('/api/postCompany/perusahaan', this.formsperusahaan).then(response => {
                this.loadData();
                this.formsperusahaan = {
                    id: '',
                    open_day: '',
                    open_hour: '',
                    phone: '',
                }
            })
        },

        editPerusahaan(index) {
            this.formsperusahaan = this.perusahaan[index];
            this.dialogperusahaan = true;
        },

        async hapusPerusahaan(index) {
            await axios.post('/api/postCompany/perusahaanDelete', this.perusahaan[index]).then(response => {
                this.perusahaan.splice(index, 1);
            })
        },

        async createContact() {
            await axios.post('/api/postCompany/contact', this.formscontact).then(response => {
                this.loadData();
                this.formscontact = {
                    id: '',
                    icon: '',
                    text: '',
                }
            })
        },

        editContact(index) {
            this.formscontact = this.contact[index];
            this.dialogcontact = true;
        },

        async hapusContact(index) {
            await axios.post('/api/postCompany/contactDelete', this.contact[index]).then(response => {
                this.contact.splice(index, 1);
            })
        },

        async createSocialMedia() {
            await axios.post('/api/postCompany/social_media', this.formssocialmedia).then(response => {
                this.loadData();
                this.formssocialmedia = {
                    id: '',
                    icon: '',
                    link: '',
                }
            })
        },
        editSocialMedia(index) {
            this.formssocialmedia = this.social_media[index];
            this.dialogsocialmedia = true;
        },

        async hapusSocialMedia(index) {
            await axios.post('/api/postCompany/social_mediaDelete', this.social_media[index]).then(response => {
                this.social_media.splice(index, 1);
            })
        },

        async createFooter() {
            await axios.post('/api/postCompany/detailFooter', this.formsfooter).then(response => {
                this.loadData();
                this.formsfooter = {
                    id: '',
                    text: '',
                }
            })
        },

        editFooter(index) {
            this.formsfooter = this.footer[index];
            this.dialogfooter = true;
        },

        async hapusFooter(index) {
            await axios.post('/api/postCompany/footerDelete', this.footer[index]).then(response => {
                this.footer.splice(index, 1);
            })
        },

        async createPesan() {
            await axios.post('/api/postCompany/pesan', this.formspesan).then(response => {
                this.loadData();
                this.formspesan = {
                    id: '',
                    name: '',
                    email: '',
                    pesan: '',
                }
            })
        },

        editPesan(index) {
            this.formspesan = this.pesan[index];
            this.dialogpesan = true;
        },

        async hapusPesan(index) {
            await axios.post('/api/postCompany/pesanDelete', this.pesan[index]).then(response => {
                this.pesan.splice(index, 1);
            })
        }

    },
    mounted() {
        this.loadData();
    },
}
</script>