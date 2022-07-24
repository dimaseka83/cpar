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
            <v-data-table :headers="headersofficeinf" :items="officeinf">
                <template v-slot:item.action="data">
                    <v-tooltip bottom>
                        <template v-slot:activator="{ on }">
                            <v-btn icon v-on="on" @click="editofficeinf(data.index)">
                                <v-icon>mdi-pencil</v-icon>
                            </v-btn>
                        </template>
                        <span>Edit</span>
                    </v-tooltip>
                    <v-tooltip bottom>
                        <template v-slot:activator="{ on }">
                            <v-btn icon v-on="on" @click="hapusofficeinf(data.index)">
                                <v-icon>mdi-delete</v-icon>
                            </v-btn>
                        </template>
                        <span>Delete</span>
                    </v-tooltip>
                </template>
                <template v-slot:top>
                    <v-toolbar flat>
                        <v-toolbar-title>Office Info </v-toolbar-title>
                        <v-spacer></v-spacer>
                        <v-dialog v-model="dialogofficeinf" max-width="500px">
                            <template v-slot:activator="{ on, attrs}">
                                <v-btn color="primary" dark class="mb-2" v-bind="attrs" v-on="on">Create</v-btn>
                            </template>
                            <v-card>
                                <v-card-title>Create Slide</v-card-title>
                                <v-card-text>
                                    <v-text-field label="Title" v-model="formofficeinf.title"></v-text-field>
                                    <v-text-field label="Title Address" v-model="formofficeinf.title_addr">
                                    </v-text-field>
                                    <v-text-field label="Phone Address" v-model="formofficeinf.phone_title">
                                    </v-text-field>
                                    <v-text-field label="Office Name" v-model="formofficeinf.office_name">
                                    </v-text-field>
                                    <v-text-field label="Address" v-model="formofficeinf.addr"></v-text-field>
                                </v-card-text>
                                <v-card-actions>
                                    <v-btn color="blue darken-1" text @click="dialogofficeinf = false">Close</v-btn>
                                    <v-btn color="blue darken-1" text
                                        @click="dialogofficeinf = false; createofficeinf()">
                                        Create</v-btn>
                                </v-card-actions>
                            </v-card>
                        </v-dialog>
                    </v-toolbar>
                </template>
            </v-data-table>
            <v-data-table :headers="headerscompanyinf" :items="companyinf">
                <template v-slot:item.action="data">
                    <v-tooltip bottom>
                        <template v-slot:activator="{ on }">
                            <v-btn icon v-on="on" @click="editcompanyinf(data.index)">
                                <v-icon>mdi-pencil</v-icon>
                            </v-btn>
                        </template>
                        <span>Edit</span>
                    </v-tooltip>
                    <v-tooltip bottom>
                        <template v-slot:activator="{ on }">
                            <v-btn icon v-on="on" @click="hapuscompanyinf(data.index)">
                                <v-icon>mdi-delete</v-icon>
                            </v-btn>
                        </template>
                        <span>Delete</span>
                    </v-tooltip>
                </template>
                <template v-slot:top>
                    <v-toolbar flat>
                        <v-toolbar-title>Company Info </v-toolbar-title>
                        <v-spacer></v-spacer>
                        <v-dialog v-model="dialogcompanyinf" max-width="500px">
                            <template v-slot:activator="{ on, attrs}">
                                <v-btn color="primary" dark class="mb-2" v-bind="attrs" v-on="on">Create</v-btn>
                            </template>
                            <v-card>
                                <v-card-title>Create Slide</v-card-title>
                                <v-card-text>
                                    <v-text-field label="Title" v-model="formcompanyinf.title"></v-text-field>
                                    <v-text-field label="Title Additional" v-model="formcompanyinf.title_additional">
                                    </v-text-field>
                                    <v-text-field label="Title Databox" v-model="formcompanyinf.title_databox">
                                    </v-text-field>
                                    <v-text-field label="Title Reg" v-model="formcompanyinf.title_reg"></v-text-field>
                                    <v-text-field label="Title Vat" v-model="formcompanyinf.title_vat"></v-text-field>
                                </v-card-text>
                                <v-card-actions>
                                    <v-btn color="blue darken-1" text @click="dialogcompanyinf = false">Close</v-btn>
                                    <v-btn color="blue darken-1" text
                                        @click="dialogcompanyinf = false; createcompanyinf()">
                                        Create</v-btn>
                                </v-card-actions>
                            </v-card>
                        </v-dialog>
                    </v-toolbar>
                </template>
            </v-data-table>
            <v-data-table :headers="headersbillinginf" :items="billinginf">
                <template v-slot:item.action="data">
                    <v-tooltip bottom>
                        <template v-slot:activator="{ on }">
                            <v-btn icon v-on="on" @click="editbillinginf(data.index)">
                                <v-icon>mdi-pencil</v-icon>
                            </v-btn>
                        </template>
                        <span>Edit</span>
                    </v-tooltip>
                    <v-tooltip bottom>
                        <template v-slot:activator="{ on }">
                            <v-btn icon v-on="on" @click="hapusbillinginf(data.index)">
                                <v-icon>mdi-delete</v-icon>
                            </v-btn>
                        </template>
                        <span>Delete</span>
                    </v-tooltip>
                </template>
                <template v-slot:top>
                    <v-toolbar flat>
                        <v-toolbar-title>Billing Info </v-toolbar-title>
                        <v-spacer></v-spacer>
                        <v-dialog v-model="dialogbillinginf" max-width="500px">
                            <template v-slot:activator="{ on, attrs}">
                                <v-btn color="primary" dark class="mb-2" v-bind="attrs" v-on="on">Create</v-btn>
                            </template>
                            <v-card>
                                <v-card-title>Create Slide</v-card-title>
                                <v-card-text>
                                    <v-text-field label="Title" v-model="formbillinginf.title"></v-text-field>
                                    <v-text-field label="Title Reg" v-model="formbillinginf.title_reg"></v-text-field>
                                </v-card-text>
                                <v-card-actions>
                                    <v-btn color="blue darken-1" text @click="dialogbillinginf = false">Close</v-btn>
                                    <v-btn color="blue darken-1" text
                                        @click="dialogbillinginf = false; createbillinginf()">
                                        Create</v-btn>
                                </v-card-actions>
                            </v-card>
                        </v-dialog>
                    </v-toolbar>
                </template>
            </v-data-table>
            <v-data-table :headers="headersregistration" :items="registration">
                <template v-slot:item.action="data">
                    <v-tooltip bottom>
                        <template v-slot:activator="{ on }">
                            <v-btn icon v-on="on" @click="editregistration(data.index)">
                                <v-icon>mdi-pencil</v-icon>
                            </v-btn>
                        </template>
                        <span>Edit</span>
                    </v-tooltip>
                    <v-tooltip bottom>
                        <template v-slot:activator="{ on }">
                            <v-btn icon v-on="on" @click="hapusregistration(data.index)">
                                <v-icon>mdi-delete</v-icon>
                            </v-btn>
                        </template>
                        <span>Delete</span>
                    </v-tooltip>
                </template>
                <template v-slot:top>
                    <v-toolbar flat>
                        <v-toolbar-title>Registration Info </v-toolbar-title>
                        <v-spacer></v-spacer>
                        <v-dialog v-model="dialogregistration" max-width="500px">
                            <template v-slot:activator="{ on, attrs}">
                                <v-btn color="primary" dark class="mb-2" v-bind="attrs" v-on="on">Create</v-btn>
                            </template>
                            <v-card>
                                <v-card-title>Create Slide</v-card-title>
                                <v-card-text>
                                    <v-text-field label="Title Registration" v-model="formregistration.registration">
                                    </v-text-field>
                                </v-card-text>
                                <v-card-actions>
                                    <v-btn color="blue darken-1" text @click="dialogregistration = false">Close</v-btn>
                                    <v-btn color="blue darken-1" text
                                        @click="dialogregistration = false; createregistration()">
                                        Create</v-btn>
                                </v-card-actions>
                            </v-card>
                        </v-dialog>
                    </v-toolbar>
                </template>
            </v-data-table>
            <v-data-table :headers="headersvat" :items="vat">
                <template v-slot:item.action="data">
                    <v-tooltip bottom>
                        <template v-slot:activator="{ on }">
                            <v-btn icon v-on="on" @click="editvat(data.index)">
                                <v-icon>mdi-pencil</v-icon>
                            </v-btn>
                        </template>
                        <span>Edit</span>
                    </v-tooltip>
                    <v-tooltip bottom>
                        <template v-slot:activator="{ on }">
                            <v-btn icon v-on="on" @click="hapusvat(data.index)">
                                <v-icon>mdi-delete</v-icon>
                            </v-btn>
                        </template>
                        <span>Delete</span>
                    </v-tooltip>
                </template>
                <template v-slot:top>
                    <v-toolbar flat>
                        <v-toolbar-title>Vat Info </v-toolbar-title>
                        <v-spacer></v-spacer>
                        <v-dialog v-model="dialogvat" max-width="500px">
                            <template v-slot:activator="{ on, attrs}">
                                <v-btn color="primary" dark class="mb-2" v-bind="attrs" v-on="on">Create</v-btn>
                            </template>
                            <v-card>
                                <v-card-title>Create Slide</v-card-title>
                                <v-card-text>
                                    <v-text-field label="Title" v-model="formvat.title"></v-text-field>
                                    <v-text-field label="Text" v-model="formvat.text"></v-text-field>
                                </v-card-text>
                                <v-card-actions>
                                    <v-btn color="blue darken-1" text @click="dialogvat = false">Close</v-btn>
                                    <v-btn color="blue darken-1" text @click="dialogvat = false; createvat()">
                                        Create</v-btn>
                                </v-card-actions>
                            </v-card>
                        </v-dialog>
                    </v-toolbar>
                </template>
            </v-data-table>
            <v-data-table :headers="headersdatabox" :items="databox">
                <template v-slot:item.action="data">
                    <v-tooltip bottom>
                        <template v-slot:activator="{ on }">
                            <v-btn icon v-on="on" @click="editdatabox(data.index)">
                                <v-icon>mdi-pencil</v-icon>
                            </v-btn>
                        </template>
                        <span>Edit</span>
                    </v-tooltip>
                    <v-tooltip bottom>
                        <template v-slot:activator="{ on }">
                            <v-btn icon v-on="on" @click="hapusdatabox(data.index)">
                                <v-icon>mdi-delete</v-icon>
                            </v-btn>
                        </template>
                        <span>Delete</span>
                    </v-tooltip>
                </template>
                <template v-slot:top>
                    <v-toolbar flat>
                        <v-toolbar-title>Databox Info </v-toolbar-title>
                        <v-spacer></v-spacer>
                        <v-dialog v-model="dialogdatabox" max-width="500px">
                            <template v-slot:activator="{ on, attrs}">
                                <v-btn color="primary" dark class="mb-2" v-bind="attrs" v-on="on">Create</v-btn>
                            </template>
                            <v-card>
                                <v-card-title>Create Slide</v-card-title>
                                <v-card-text>
                                    <v-text-field label="Title Databox" v-model="formdatabox.databox"></v-text-field>
                                </v-card-text>
                                <v-card-actions>
                                    <v-btn color="blue darken-1" text @click="dialogdatabox = false">Close</v-btn>
                                    <v-btn color="blue darken-1" text @click="dialogdatabox = false; createdatabox()">
                                        Create</v-btn>
                                </v-card-actions>
                            </v-card>
                        </v-dialog>
                    </v-toolbar>
                </template>
            </v-data-table>
            <v-data-table :headers="headersAdditional" :items="additional">
                <template v-slot:item.action="data">
                    <v-tooltip bottom>
                        <template v-slot:activator="{ on }">
                            <v-btn icon v-on="on" @click="editadditional(data.index)">
                                <v-icon>mdi-pencil</v-icon>
                            </v-btn>
                        </template>
                        <span>Edit</span>
                    </v-tooltip>
                    <v-tooltip bottom>
                        <template v-slot:activator="{ on }">
                            <v-btn icon v-on="on" @click="hapusadditional(data.index)">
                                <v-icon>mdi-delete</v-icon>
                            </v-btn>
                        </template>
                        <span>Delete</span>
                    </v-tooltip>
                </template>
                <template v-slot:top>
                    <v-toolbar flat>
                        <v-toolbar-title>Additional Info </v-toolbar-title>
                        <v-spacer></v-spacer>
                        <v-dialog v-model="dialogadditional" max-width="500px">
                            <template v-slot:activator="{ on, attrs}">
                                <v-btn color="primary" dark class="mb-2" v-bind="attrs" v-on="on">Create</v-btn>
                            </template>
                            <v-card>
                                <v-card-title>Create Slide</v-card-title>
                                <v-card-text>
                                    <v-text-field label="Title Additional" v-model="formadditional.additional">
                                    </v-text-field>
                                </v-card-text>
                                <v-card-actions>
                                    <v-btn color="blue darken-1" text @click="dialogadditional = false">Close</v-btn>
                                    <v-btn color="blue darken-1" text
                                        @click="dialogadditional = false; createadditional()">
                                        Create</v-btn>
                                </v-card-actions>
                            </v-card>
                        </v-dialog>
                    </v-toolbar>
                </template>
            </v-data-table>
            <v-data-table :headers="headersphone" :items="phone">
                <template v-slot:item.action="data">
                    <v-tooltip bottom>
                        <template v-slot:activator="{ on }">
                            <v-btn icon v-on="on" @click="editphone(data.index)">
                                <v-icon>mdi-pencil</v-icon>
                            </v-btn>
                        </template>
                        <span>Edit</span>
                    </v-tooltip>
                    <v-tooltip bottom>
                        <template v-slot:activator="{ on }">
                            <v-btn icon v-on="on" @click="hapusphone(data.index)">
                                <v-icon>mdi-delete</v-icon>
                            </v-btn>
                        </template>
                        <span>Delete</span>
                    </v-tooltip>
                </template>
                <template v-slot:top>
                    <v-toolbar flat>
                        <v-toolbar-title>Header Phone</v-toolbar-title>
                        <v-spacer></v-spacer>
                        <v-dialog v-model="dialogphone" max-width="500px">
                            <template v-slot:activator="{ on, attrs}">
                                <v-btn color="primary" dark class="mb-2" v-bind="attrs" v-on="on">Create</v-btn>
                            </template>
                            <v-card>
                                <v-card-title>Create Slide</v-card-title>
                                <v-card-text>
                                    <v-text-field label="Number" v-model="formphone.number"></v-text-field>
                                    <v-text-field label="Title" v-model="formphone.title"></v-text-field>
                                </v-card-text>
                                <v-card-actions>
                                    <v-btn color="blue darken-1" text @click="dialogphone = false">Close</v-btn>
                                    <v-btn color="blue darken-1" text @click="dialogphone = false; createphone()">
                                        Create</v-btn>
                                </v-card-actions>
                            </v-card>
                        </v-dialog>
                    </v-toolbar>
                </template>
            </v-data-table>
            <v-data-table :headers="headersname_bank" :items="name_bank">
                <template v-slot:item.action="data">
                    <v-tooltip bottom>
                        <template v-slot:activator="{ on }">
                            <v-btn icon v-on="on" @click="editnamebank(data.index)">
                                <v-icon>mdi-pencil</v-icon>
                            </v-btn>
                        </template>
                        <span>Edit</span>
                    </v-tooltip>
                    <v-tooltip bottom>
                        <template v-slot:activator="{ on }">
                            <v-btn icon v-on="on" @click="hapusnamebank(data.index)">
                                <v-icon>mdi-delete</v-icon>
                            </v-btn>
                        </template>
                        <span>Delete</span>
                    </v-tooltip>
                </template>
                <template v-slot:top>
                    <v-toolbar flat>
                        <v-toolbar-title>Header Bank </v-toolbar-title>
                        <v-spacer></v-spacer>
                        <v-dialog v-model="dialogname_bank" max-width="500px">
                            <template v-slot:activator="{ on, attrs}">
                                <v-btn color="primary" dark class="mb-2" v-bind="attrs" v-on="on">Create</v-btn>
                            </template>
                            <v-card>
                                <v-card-title>Create Slide</v-card-title>
                                <v-card-text>
                                    <v-text-field label="Title" v-model="formname_bank.name_bank"></v-text-field>
                                </v-card-text>
                                <v-card-actions>
                                    <v-btn color="blue darken-1" text @click="dialogname_bank = false">Close</v-btn>
                                    <v-btn color="blue darken-1" text
                                        @click="dialogname_bank = false; createnamebank()">
                                        Create</v-btn>
                                </v-card-actions>
                            </v-card>
                        </v-dialog>
                    </v-toolbar>
                </template>
            </v-data-table>
            <v-data-table :headers="headerscontact_title" :items="contact_title">
                <template v-slot:item.action="data">
                    <v-tooltip bottom>
                        <template v-slot:activator="{ on }">
                            <v-btn icon v-on="on" @click="editcontacttitle(data.index)">
                                <v-icon>mdi-pencil</v-icon>
                            </v-btn>
                        </template>
                        <span>Edit</span>
                    </v-tooltip>
                    <v-tooltip bottom>
                        <template v-slot:activator="{ on }">
                            <v-btn icon v-on="on" @click="hapuscontacttitle(data.index)">
                                <v-icon>mdi-delete</v-icon>
                            </v-btn>
                        </template>
                        <span>Delete</span>
                    </v-tooltip>
                </template>
                <template v-slot:top>
                    <v-toolbar flat>
                        <v-toolbar-title>Header Contact </v-toolbar-title>
                        <v-spacer></v-spacer>
                        <v-dialog v-model="dialogcontact_title" max-width="500px">
                            <template v-slot:activator="{ on, attrs}">
                                <v-btn color="primary" dark class="mb-2" v-bind="attrs" v-on="on">Create</v-btn>
                            </template>
                            <v-card>
                                <v-card-title>Create Slide</v-card-title>
                                <v-card-text>
                                    <v-text-field label="Text" v-model="formcontact_title.text"></v-text-field>
                                    <v-text-field label="Title" v-model="formcontact_title.title"></v-text-field>
                                </v-card-text>
                                <v-card-actions>
                                    <v-btn color="blue darken-1" text @click="dialogcontact_title = false">Close</v-btn>
                                    <v-btn color="blue darken-1" text
                                        @click="dialogcontact_title = false; createcontacttitle()">
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
import NavAdminVue from '../components/NavAdmin.vue';
import mix from '../mixins/mix.js';
export default {
    mixins: [mix],
    components: {
        NavAdminVue,
    },
    data() {
        return {
            officeinf: [],
            dialogofficeinf: false,
            headersofficeinf: [
                {text: 'title',value: 'title'},
                {text: 'title addr',value: 'title_addr'},
                {text: 'phone title',value: 'phone_title'},
                {text: 'office name',value: 'office_name'},
                {text: 'addr',value: 'addr'},
                {text: 'Action',value: 'action'},
            ],
            formofficeinf: {
                id: '',
                title: '',
                title_addr: '',
                phone_title: '',
                office_name: '',
                addr: '',
            },

            companyinf: [],
            dialogcompanyinf: false,
            headerscompanyinf: [
                {text: 'title',value: 'title'},
                {text: 'title additional',value: 'title_additional'},
                {text: 'title databox',value: 'title_databox'},
                {text: 'title_reg',value: 'title_reg'},
                {text: 'title_vat',value: 'title_vat'},
                {text: 'Action',value: 'action'},
            ],
            formcompanyinf: {
                id: '',
                title: '',
                title_additional: '',
                title_databox: '',
                title_reg: '',
                title_vat: '',
            },

            billinginf: [],
            dialogbillinginf: false,
            headersbillinginf: [
                {text: 'title',value: 'title'},
                {text: 'title reg',value: 'title_reg'},
                {text: 'Action',value: 'action'},
            ],
            formbillinginf: {
                id: '',
                title: '',
                title_reg: '',
            },

            registration: [],
            dialogregistration: false,
            headersregistration: [
                {text: 'registration',value: 'registration'},
                {text: 'Action',value: 'action'},

            ],
            formregistration: {
                id: '',
                registration: '',
            },

            vat: [],
            dialogvat: false,
            headersvat: [
                {text: 'text',value: 'text'},
                {text: 'title',value: 'title'},
                {text: 'Action',value: 'action'},

            ],
            formvat: {
                id: '',
                text: '',
                title: '',
            },

            databox: [],
            dialogdatabox: false,
            headersdatabox: [
                {text: 'databox',value: 'databox'},
                {text: 'Action',value: 'action'},

            ],
            formdatabox: {
                id: '',
                databox: '',
            },

            additional: [],
            dialogadditional: false,
            headersAdditional: [
                {text: 'additional',value: 'additional'},
                {text: 'Action',value: 'action'},

            ],
            formadditional: {
                id: '',
                additional: '',
            },

            phone: [],
            dialogphone: false,
            headersphone: [
                {text: 'number',value: 'number'},
                {text: 'title',value: 'title'},
                {text: 'Action',value: 'action'},

            ],
            formphone: {
                id: '',
                number: '',
                title: '',
            },

            name_bank: [],
            dialogname_bank: false,
            headersname_bank: [
                {text: 'name_bank',value: 'name_bank'},
                {text: 'Action',value: 'action'},

            ],
            formname_bank: {
                id: '',
                name_bank: '',
            },

            contact_title: [],
            dialogcontact_title: false,
            headerscontact_title: [
                {text: 'text',value: 'text'},
                {text: 'title',value: 'title'},
                {text: 'Action',value: 'action'},

            ],
            formcontact_title: {
                id: '',
                text: '',
                title: '',
            },
        }
    },
    methods: {
        async loadData(){
            await axios.get('/api/contacts/officeinf').then(response => {
                this.officeinf = response.data;
            });

            await axios.get('/api/contacts/companyinf').then(response => {
                this.companyinf = response.data;
            });

            await axios.get('/api/contacts/billinginf').then(response => {
                this.billinginf = response.data;
            });

            await axios.get('/api/contacts/registration').then(response => {
                this.registration = response.data;
            });

            await axios.get('/api/contacts/vat').then(response => {
                this.vat = response.data;
            });

            await axios.get('/api/contacts/databox').then(response => {
                this.databox = response.data;
            });

            await axios.get('/api/contacts/additional').then(response => {
                this.additional = response.data;
            });

            await axios.get('/api/contacts/phone').then(response => {
                this.phone = response.data;
            });

            await axios.get('/api/contacts/name_bank').then(response => {
                this.name_bank = response.data;
            });

            await axios.get('/api/contacts/contact_title').then(response => {
                this.contact_title = response.data;
            });
        },
        async createofficeinf(){
            await axios.post('/api/postContacts/officeinf',this.formofficeinf).then(response => {
                this.loadData();
                this.formofficeinf = {
                    id: '',
                    title: '',
                    title_addr: '',
                    phone_title: '',
                    office_name: '',
                    addr: '',
                };
            });
            this.dialogofficeinf = false;
        },

        editofficeinf(item){
            this.formofficeinf = this.officeinf[item];
            this.dialogofficeinf = true;
        },

        async hapusofficeinf(item){
            await axios.post('/api/postContacts/officeinfDelete',this.officeinf[item]).then(response => {
                this.officeinf.splice(item,1);
            });
        },

        async createcompanyinf(){
            await axios.post('/api/postContacts/companyinf',this.formcompanyinf).then(response => {
                this.loadData();
                this.formcompanyinf = {
                    id: '',
                    title: '',
                    title_additional: '',
                    title_databox: '',
                    title_reg: '',
                    title_vat: '',
                };
            });
            this.dialogcompanyinf = false;
        },

        editcompanyinf(item){
            this.formcompanyinf = this.companyinf[item];
            this.dialogcompanyinf = true;
        },

        async hapuscompanyinf(item){
            await axios.post('/api/postContacts/companyinfDelete',this.companyinf[item]).then(response => {
                this.companyinf.splice(item,1);
            });
        },

        async createbillinginf(){
            await axios.post('/api/postContacts/billinginf',this.formbillinginf).then(response => {
                this.loadData();
                this.formbillinginf = {
                    id: '',
                    title: '',
                    title_reg: '',
                };
            });
            this.dialogbillinginf = false;
        },

        editbillinginf(item){
            this.formbillinginf = this.billinginf[item];
            this.dialogbillinginf = true;
        },

        async hapusbillinginf(item){
            await axios.post('/api/postContacts/billinginfDelete',this.billinginf[item]).then(response => {
                this.billinginf.splice(item,1);
            });
        },

        async createregistration(){
            await axios.post('/api/postContacts/registration',this.formregistration).then(response => {
                this.loadData();
                this.formregistration = {
                    id: '',
                    title: '',
                    title_reg: '',
                };
            });
            this.dialogregistration = false;
        },

        editregistration(item){
            this.formregistration = this.registration[item];
            this.dialogregistration = true;
        },

        async hapusregistration(item){
            await axios.post('/api/postContacts/registrationDelete',this.registration[item]).then(response => {
                this.registration.splice(item,1);
            });
        },

        async createvat(){
            await axios.post('/api/postContacts/vat',this.formvat).then(response => {
                this.loadData();
                this.formvat = {
                    id: '',
                    text: '',
                    title: '',
                };
            });
            this.dialogvat = false;
        },

        editvat(item){
            this.formvat = this.vat[item];
            this.dialogvat = true;
        },

        async hapusvat(item){
            await axios.post('/api/postContacts/vatDelete',this.vat[item]).then(response => {
                this.vat.splice(item,1);
            });
        },

        async createdatabox(){
            await axios.post('/api/postContacts/databox',this.formdatabox).then(response => {
                this.loadData();
                this.formdatabox = {
                    id: '',
                    text: '',
                    title: '',
                };
            });
            this.dialogdatabox = false;
        },

        editdatabox(item){
            this.formdatabox = this.databox[item];
            this.dialogdatabox = true;
        },

        async hapusdatabox(item){
            await axios.post('/api/postContacts/databoxDelete',this.databox[item]).then(response => {
                this.databox.splice(item,1);
            });
        },

        async createadditional(){
            await axios.post('/api/postContacts/additional',this.formadditional).then(response => {
                this.loadData();
                this.formadditional = {
                    id: '',
                    additional: '',
                };
            });
            this.dialogadditional = false;
        },
        editadditional(item){
            this.formadditional = this.additional[item];
            this.dialogadditional = true;
        },
        async hapusadditional(item){
            await axios.post('/api/postContacts/additionalDelete',this.additional[item]).then(response => {
                this.additional.splice(item,1);
            });
        },
        
        async createphone(){
            await axios.post('/api/postContacts/phone',this.formphone).then(response => {
                this.loadData();
                this.formphone = {
                    id: '',
                    number: '',
                    title: '',
                };
            });
            this.dialogphone = false;
        },

        editphone(item){
            this.formphone = this.phone[item];
            this.dialogphone = true;
        },

        async hapusphone(item){
            await axios.post('/api/postContacts/phoneDelete',this.phone[item]).then(response => {
                this.phone.splice(item,1);
            });
        },

        async createnamebank(){
            await axios.post('/api/postContacts/name_bank',this.formname_bank).then(response => {
                this.loadData();
                this.formname_bank = {
                    id: '',
                    name_bank: '',
                };
            });
            this.dialognamebank = false;
        },

        editnamebank(item){
            this.formname_bank = this.name_bank[item];
            this.dialogname_bank = true;
        },

        async hapusnamebank(item){
            await axios.post('/api/postContacts/name_bankDelete',this.name_bank[item]).then(response => {
                this.name_bank.splice(item,1);
            });
        },

        async createcontacttitle(){
            await axios.post('/api/postContacts/contact_title',this.formcontact_title).then(response => {
                this.loadData();
                this.formcontact_title = {
                    id: '',
                    contact_title: '',
                };
            });
            this.dialogcontacttitle = false;
        },

        editcontacttitle(item){
            this.formcontact_title = this.contact_title[item];
            this.dialogcontact_title = true;
        },

        async hapuscontacttitle(item){
            await axios.post('/api/postContacts/contact_titleDelete',this.contact_title[item]).then(response => {
                this.contact_title.splice(item,1);
            });
        },
    },

    mounted() {
        this.loadData();
    },
}
</script>