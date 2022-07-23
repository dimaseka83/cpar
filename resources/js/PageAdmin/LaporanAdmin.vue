<template>
    <v-app>
        <v-card class="my-16">
            <v-data-table :headers="headersLaporan" :items="laporan">
                <template v-slot:item.action="data">
                    <v-tooltip bottom>
                        <template v-slot:activator="{ on }">
                            <v-btn icon v-on="on" @click="editLaporan(data.index)">
                                <v-icon>mdi-pencil</v-icon>
                            </v-btn>
                        </template>
                        <span>Edit</span>
                    </v-tooltip>
                    <v-tooltip bottom>
                        <template v-slot:activator="{ on }">
                            <v-btn icon v-on="on" @click="hapusLaporan(data.index)">
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
                        <v-dialog v-model="dialogLaporan" max-width="500px">
                            <template v-slot:activator="{ on, attrs}">
                                <v-btn color="primary" dark class="mb-2" v-bind="attrs" v-on="on">Create</v-btn>
                            </template>
                            <v-card>
                                <v-card-title>Create Slide</v-card-title>
                                <v-card-text>
                                    <v-text-field v-model="formLaporan.laporan" label="Laporan" required>
                                    </v-text-field>
                                    <v-text-field v-model="formLaporan.area" label="Laporan Area" required>
                                    </v-text-field>
                                    <v-text-field v-model="formLaporan.minyak" label="Laporan Minyak" required>
                                    </v-text-field>
                                    <v-text-field v-model="formLaporan.non_minyak" label="Laporan Non Minyak" required>
                                    </v-text-field>
                                    <v-text-field v-model="formLaporan.all" label="Laporan All" required>
                                    </v-text-field>
                                    <v-menu ref="menu" v-model="menu" transition="scale-transition" offset-y
                                        min-width="auto">
                                        <template v-slot:activator="{ on, attrs }">
                                            <v-text-field v-model="formLaporan.tanggal" label="Tanggal"
                                                prepend-icon="mdi-calendar" readonly v-bind="attrs" v-on="on">
                                            </v-text-field>
                                        </template>
                                        <v-date-picker v-model="formLaporan.tanggal" no-title scrollable>
                                            <v-spacer></v-spacer>
                                            <v-btn text color="primary" @click="menu = false">
                                                Cancel
                                            </v-btn>
                                            <v-btn text color="primary" @click="$refs.menu.save(date)">
                                                OK
                                            </v-btn>
                                        </v-date-picker>
                                    </v-menu>
                                </v-card-text>
                                <v-card-actions>
                                    <v-btn color="blue darken-1" text @click="dialogLaporan = false">Close</v-btn>
                                    <v-btn color="blue darken-1" text @click="dialogLaporan = false; createLaporan()">
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
            menu: false,
            laporan: [],
            dialogLaporan: false,
            headersLaporan: [
                {text: 'Laporan', value: 'laporan'},
                { text: 'Area', value: 'area' },
                { text: 'Minyak', value: 'minyak' },
                { text: 'Non-Minyak', value: 'minyak' },
                { text: 'Semua', value: 'all' },
                { text: 'Tanggal', value: 'tanggal' },
                { text: 'Action', value: 'action' }
            ],
            formLaporan: {
                id: '',
                area: '',
                minyak: '',
                non_minyak: '',
                all: '',
                tanggal: '',
            },
        }
    },
    methods: {
        async loadData() {
            await axios.get('/api/laporan/laporan').then(response => {
                this.laporan = response.data
            })
            this.loading = false
        },
        async createLaporan() {
            await axios.post('/api/postLaporan/laporan', this.formLaporan).then(response => {
                this.loadData();
                this.formLaporan = {
                    id: '',
                    area: '',
                    minyak: '',
                    non_minyak: '',
                    all: '',
                    tanggal: '',
                }
            })
        },

        editLaporan(index) {
            this.formLaporan = this.laporan[index]
            this.dialogLaporan = true
        },

        async hapusLaporan(index) {
            await axios.post('/api/postLaporan/laporanDelete', this.laporan[index]).then(response => {
                this.laporan.splice(index, 1)
            })
        },
    },
    mounted() {
        this.loadData()
    },
}
</script>