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
            <v-data-table :headers="headerslides" :items="slides">
                <template v-slot:item.image="data">
                    <v-img :src="'/images/home/slides/'+data.item.image" :width="100" :height="100" class="mr-4">
                    </v-img>
                </template>
                <template v-slot:item.actions="data">
                    <v-tooltip bottom>
                        <template v-slot:activator="{ on }">
                            <v-btn icon v-on="on" @click="editSlide(data.index)">
                                <v-icon>mdi-pencil</v-icon>
                            </v-btn>
                        </template>
                        <span>Edit</span>
                    </v-tooltip>
                    <v-tooltip bottom>
                        <template v-slot:activator="{ on }">
                            <v-btn icon v-on="on" @click="hapusSlide(data.index)">
                                <v-icon>mdi-delete</v-icon>
                            </v-btn>
                        </template>
                        <span>Delete</span>
                    </v-tooltip>
                </template>
                <template v-slot:top>
                    <v-toolbar flat>
                        <v-toolbar-title>Header Slide <span class="subtitle-2 text--disabled">(Gambar harus HD)</span>
                        </v-toolbar-title>
                        <v-spacer></v-spacer>
                        <v-dialog v-model="dialogslide" max-width="500px">
                            <template v-slot:activator="{ on, attrs}">
                                <v-btn color="primary" dark class="mb-2" v-bind="attrs" v-on="on">Create</v-btn>
                            </template>
                            <v-card>
                                <v-card-title>Create Slide</v-card-title>
                                <v-card-text>
                                    <v-text-field label="Title" v-model="formslides.title"></v-text-field>
                                    <v-text-field label="Description" v-model="formslides.subtitle"></v-text-field>
                                    <v-file-input accept="image/*" v-model="formslides.image" label="Image">
                                    </v-file-input>
                                </v-card-text>
                                <v-card-actions>
                                    <v-btn color="blue darken-1" text @click="dialogslide = false">Close</v-btn>
                                    <v-btn color="blue darken-1" text @click="dialogslide = false; createHeaderSlide()">
                                        Create</v-btn>
                                </v-card-actions>
                            </v-card>
                        </v-dialog>
                    </v-toolbar>
                </template>
            </v-data-table>

            <v-data-table :headers="headersimageslide" :items="images_slides">
                <template v-slot:item.image="data">
                    <v-img :src="'/images/home/images_slides/'+data.item.image" :width="100" :height="100" class="mr-4">
                    </v-img>
                </template>
                <template v-slot:item.actions="data">
                    <v-tooltip bottom>
                        <template v-slot:activator="{ on }">
                            <v-btn icon v-on="on" @click="editImageSlide(data.index)">
                                <v-icon>mdi-pencil</v-icon>
                            </v-btn>
                        </template>
                        <span>Edit</span>
                    </v-tooltip>
                    <v-tooltip bottom>
                        <template v-slot:activator="{ on }">
                            <v-btn icon v-on="on" @click="hapusImageSlide(data.index)">
                                <v-icon>mdi-delete</v-icon>
                            </v-btn>
                        </template>
                        <span>Delete</span>
                    </v-tooltip>
                </template>
                <template v-slot:top>
                    <v-toolbar flat>
                        <v-toolbar-title>Image Slide <span class="subtitle-2 text--disabled">(Gambar harus HD)</span>
                        </v-toolbar-title>
                        <v-spacer></v-spacer>
                        <v-dialog v-model="dialogimageslide" max-width="500px">
                            <template v-slot:activator="{ on, attrs}">
                                <v-btn color="primary" dark class="mb-2" v-bind="attrs" v-on="on">Create</v-btn>
                            </template>
                            <v-card>
                                <v-card-title>Create Slide</v-card-title>
                                <v-card-text>
                                    <v-file-input accept="image/*" v-model="formimageslide.image" label="Image">
                                    </v-file-input>
                                </v-card-text>
                                <v-card-actions>
                                    <v-btn color="blue darken-1" text @click="dialogimageslide = false">Close</v-btn>
                                    <v-btn color="blue darken-1" text
                                        @click="dialogimageslide = false; createImageSlide()">Create</v-btn>
                                </v-card-actions>
                            </v-card>
                        </v-dialog>
                    </v-toolbar>
                </template>
            </v-data-table>

            <v-data-table :headers="headerpage2" :items="page2">
                <template v-slot:item.actions="data">
                    <v-tooltip bottom>
                        <template v-slot:activator="{ on }">
                            <v-btn icon v-on="on" @click="editPage2(data.index)">
                                <v-icon>mdi-pencil</v-icon>
                            </v-btn>
                        </template>
                        <span>Edit</span>
                    </v-tooltip>
                    <v-tooltip bottom>
                        <template v-slot:activator="{ on }">
                            <v-btn icon v-on="on" @click="hapusPage2(data.index)">
                                <v-icon>mdi-delete</v-icon>
                            </v-btn>
                        </template>
                        <span>Delete</span>
                    </v-tooltip>
                </template>
                <template v-slot:top>
                    <v-toolbar flat>
                        <v-toolbar-title>Page 2 </v-toolbar-title>
                        <v-spacer></v-spacer>
                        <v-dialog v-model="dialogpage2" max-width="500px">
                            <template v-slot:activator="{ on, attrs}">
                                <v-btn color="primary" dark class="mb-2" v-bind="attrs" v-on="on">Create</v-btn>
                            </template>
                            <v-card>
                                <v-card-title>Create Slide</v-card-title>
                                <v-card-text>
                                    <v-text-field label="Title" v-model="formpage2.title"></v-text-field>
                                    <v-text-field label="Description" v-model="formpage2.subtitle"></v-text-field>
                                </v-card-text>
                                <v-card-actions>
                                    <v-btn color="blue darken-1" text @click="dialogpage2 = false">Close</v-btn>
                                    <v-btn color="blue darken-1" text @click="dialogpage2 = false; createPage2()">Create
                                    </v-btn>
                                </v-card-actions>
                            </v-card>
                        </v-dialog>
                    </v-toolbar>
                </template>
            </v-data-table>

            <v-data-table :headers="headerpage3" :items="page3">
                <template v-slot:item.image="data">
                    <v-img :src="'/images/home/page3/'+data.item.image" :width="100" :height="100" class="mr-4"></v-img>
                </template>
                <template v-slot:item.actions="data">
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
                        <v-toolbar-title>Page 3 <span class="subtitle-2 text--disabled">(Gambar harus HD)</span>
                        </v-toolbar-title>
                        <v-spacer></v-spacer>
                        <v-dialog v-model="dialogpage3" max-width="500px">
                            <template v-slot:activator="{ on, attrs}">
                                <v-btn color="primary" dark class="mb-2" v-bind="attrs" v-on="on">Create</v-btn>
                            </template>
                            <v-card>
                                <v-card-title>Create Slide</v-card-title>
                                <v-card-text>
                                    <v-text-field label="Title" v-model="formpage3.title"></v-text-field>
                                    <v-text-field label="Description" v-model="formpage3.subtitle"></v-text-field>
                                    <v-file-input accept="image/*" v-model="formpage3.image" label="Image">
                                    </v-file-input>
                                </v-card-text>
                                <v-card-actions>
                                    <v-btn color="blue darken-1" text @click="dialogpage3 = false">Close</v-btn>
                                    <v-btn color="blue darken-1" text @click="dialogpage3 = false; createPage3()">Create
                                    </v-btn>
                                </v-card-actions>
                            </v-card>
                        </v-dialog>
                    </v-toolbar>
                </template>
            </v-data-table>

            <v-data-table :headers="headersubpage3" :items="sub_page3">
                <template v-slot:item.icon="data">
                    <v-icon>{{ data.item.icon }}</v-icon>
                </template>
                <template v-slot:item.actions="data">
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
                        <v-toolbar-title>Sub Page 4
                        </v-toolbar-title>
                        <v-spacer></v-spacer>
                        <v-dialog v-model="dialogsubpage3" max-width="500px">
                            <template v-slot:activator="{ on, attrs}">
                                <v-btn color="primary" dark class="mb-2" v-bind="attrs" v-on="on">Create</v-btn>
                            </template>
                            <v-card>
                                <v-card-title>Create Slide</v-card-title>
                                <v-card-text>
                                    <v-text-field label="Icon" v-model="formsubpage3.icon"></v-text-field>
                                    <v-text-field label="Title" v-model="formsubpage3.title"></v-text-field>
                                    <v-text-field label="Subtitle" v-model="formsubpage3.subtitle"></v-text-field>
                                </v-card-text>
                                <v-card-actions>
                                    <v-btn color="blue darken-1" text @click="dialogsubpage3 = false">Close</v-btn>
                                    <v-btn color="blue darken-1" text @click="dialogsubpage3 = false; createSubPage3()">
                                        Create</v-btn>
                                </v-card-actions>
                            </v-card>
                        </v-dialog>
                    </v-toolbar>
                </template>
            </v-data-table>

            <v-data-table :headers="headerpage4" :items="page4">
                <template v-slot:item.actions="data">
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
                        <v-toolbar-title>Page 4
                        </v-toolbar-title>
                        <v-spacer></v-spacer>
                        <v-dialog v-model="dialogpage4" max-width="500px">
                            <template v-slot:activator="{ on, attrs}">
                                <v-btn color="primary" dark class="mb-2" v-bind="attrs" v-on="on">Create</v-btn>
                            </template>
                            <v-card>
                                <v-card-title>Create Slide</v-card-title>
                                <v-card-text>
                                    <v-text-field label="Title" v-model="formpage4.title"></v-text-field>
                                    <v-text-field label="Subtitle 1" v-model="formpage4.subtitle1"></v-text-field>
                                    <v-text-field label="Subtitle 2" v-model="formpage4.subtitle2"></v-text-field>
                                </v-card-text>
                                <v-card-actions>
                                    <v-btn color="blue darken-1" text @click="dialogpage4 = false">Close</v-btn>
                                    <v-btn color="blue darken-1" text @click="dialogpage4 = false; createPage4()">Create
                                    </v-btn>
                                </v-card-actions>
                            </v-card>
                        </v-dialog>
                    </v-toolbar>
                </template>
            </v-data-table>

            <v-data-table :headers="headerservices" :items="services">
                <template v-slot:item.icon="data">
                    <v-icon>{{ data.item.icon }}</v-icon>
                </template>
                <template v-slot:item.actions="data">
                    <v-tooltip bottom>
                        <template v-slot:activator="{ on }">
                            <v-btn icon v-on="on" @click="editServices(data.index)">
                                <v-icon>mdi-pencil</v-icon>
                            </v-btn>
                        </template>
                        <span>Edit</span>
                    </v-tooltip>
                    <v-tooltip bottom>
                        <template v-slot:activator="{ on }">
                            <v-btn icon v-on="on" @click="hapusServices(data.index)">
                                <v-icon>mdi-delete</v-icon>
                            </v-btn>
                        </template>
                        <span>Delete</span>
                    </v-tooltip>
                </template>
                <template v-slot:top>
                    <v-toolbar flat>
                        <v-toolbar-title>Services
                        </v-toolbar-title>
                        <v-spacer></v-spacer>
                        <v-dialog v-model="dialogservices" max-width="500px">
                            <template v-slot:activator="{ on, attrs}">
                                <v-btn color="primary" dark class="mb-2" v-bind="attrs" v-on="on">Create</v-btn>
                            </template>
                            <v-card>
                                <v-card-title>Create Slide</v-card-title>
                                <v-card-text>
                                    <v-text-field label="Icon" v-model="formservices.icon"></v-text-field>
                                    <v-text-field label="Title" v-model="formservices.title"></v-text-field>
                                    <v-text-field label="Subtitle" v-model="formservices.subtitle"></v-text-field>
                                </v-card-text>
                                <v-card-actions>
                                    <v-btn color="blue darken-1" text @click="dialogservices = false">Close</v-btn>
                                    <v-btn color="blue darken-1" text @click="dialogservices = false; createServices()">
                                        Create</v-btn>
                                </v-card-actions>
                            </v-card>
                        </v-dialog>
                    </v-toolbar>
                </template>
            </v-data-table>

            <v-data-table :headers="headerprogress" :items="progress">
                <template v-slot:item.icon="data">
                    <v-icon>{{ data.item.icon }}</v-icon>
                </template>
                <template v-slot:item.actions="data">
                    <v-tooltip bottom>
                        <template v-slot:activator="{ on }">
                            <v-btn icon v-on="on" @click="editProgress(data.index)">
                                <v-icon>mdi-pencil</v-icon>
                            </v-btn>
                        </template>
                        <span>Edit</span>
                    </v-tooltip>
                    <v-tooltip bottom>
                        <template v-slot:activator="{ on }">
                            <v-btn icon v-on="on" @click="hapusProgress(data.index)">
                                <v-icon>mdi-delete</v-icon>
                            </v-btn>
                        </template>
                        <span>Delete</span>
                    </v-tooltip>
                </template>
                <template v-slot:top>
                    <v-toolbar flat>
                        <v-toolbar-title>Progress
                        </v-toolbar-title>
                        <v-spacer></v-spacer>
                        <v-dialog v-model="dialogprogress" max-width="500px">
                            <template v-slot:activator="{ on, attrs}">
                                <v-btn color="primary" dark class="mb-2" v-bind="attrs" v-on="on">Create</v-btn>
                            </template>
                            <v-card>
                                <v-card-title>Create Slide</v-card-title>
                                <v-card-text>
                                    <v-text-field label="Number" v-model="formprogress.number"></v-text-field>
                                    <v-text-field label="Title" v-model="formprogress.title"></v-text-field>
                                    <v-text-field label="Subtitle" v-model="formprogress.subtitle"></v-text-field>
                                </v-card-text>
                                <v-card-actions>
                                    <v-btn color="blue darken-1" text @click="dialogprogress = false">Close</v-btn>
                                    <v-btn color="blue darken-1" text @click="dialogprogress = false; createProgress()">
                                        Create</v-btn>
                                </v-card-actions>
                            </v-card>
                        </v-dialog>
                    </v-toolbar>
                </template>
            </v-data-table>

            <v-data-table :headers="headerpage5" :items="page5">
                <template v-slot:item.icon="data">
                    <v-icon>{{ data.item.icon }}</v-icon>
                </template>
                <template v-slot:item.actions="data">
                    <v-tooltip bottom>
                        <template v-slot:activator="{ on }">
                            <v-btn icon v-on="on" @click="editPage5(data.index)">
                                <v-icon>mdi-pencil</v-icon>
                            </v-btn>
                        </template>
                        <span>Edit</span>
                    </v-tooltip>
                    <v-tooltip bottom>
                        <template v-slot:activator="{ on }">
                            <v-btn icon v-on="on" @click="hapusPage5(data.index)">
                                <v-icon>mdi-delete</v-icon>
                            </v-btn>
                        </template>
                        <span>Delete</span>
                    </v-tooltip>
                </template>
                <template v-slot:top>
                    <v-toolbar flat>
                        <v-toolbar-title>Page 5
                        </v-toolbar-title>
                        <v-spacer></v-spacer>
                        <v-dialog v-model="dialogpage5" max-width="500px">
                            <template v-slot:activator="{ on, attrs}">
                                <v-btn color="primary" dark class="mb-2" v-bind="attrs" v-on="on">Create</v-btn>
                            </template>
                            <v-card>
                                <v-card-title>Create Slide</v-card-title>
                                <v-card-text>
                                    <v-text-field label="Title" v-model="formpage5.title"></v-text-field>
                                    <v-text-field label="Subtitle" v-model="formpage5.subtitle"></v-text-field>
                                </v-card-text>
                                <v-card-actions>
                                    <v-btn color="blue darken-1" text @click="dialogpage5 = false">Close</v-btn>
                                    <v-btn color="blue darken-1" text @click="dialogpage5 = false; createPage5()">Create
                                    </v-btn>
                                </v-card-actions>
                            </v-card>
                        </v-dialog>
                    </v-toolbar>
                </template>
            </v-data-table>

            <v-data-table :headers="headersubpage5" :items="sub_page5">
                <template v-slot:item.icon="data">
                    <v-icon>{{ data.item.icon }}</v-icon>
                </template>
                <template v-slot:item.actions="data">
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
                        <v-toolbar-title>Sub Page 5
                        </v-toolbar-title>
                        <v-spacer></v-spacer>
                        <v-dialog v-model="dialogsubpage5" max-width="500px">
                            <template v-slot:activator="{ on, attrs}">
                                <v-btn color="primary" dark class="mb-2" v-bind="attrs" v-on="on">Create</v-btn>
                            </template>
                            <v-card>
                                <v-card-title>Create Slide</v-card-title>
                                <v-card-text>
                                    <v-text-field label="Icon" v-model="formsubpage5.icon"></v-text-field>
                                    <v-text-field label="Title" v-model="formsubpage5.title"></v-text-field>
                                    <v-text-field label="Subtitle" v-model="formsubpage5.subtitle"></v-text-field>
                                </v-card-text>
                                <v-card-actions>
                                    <v-btn color="blue darken-1" text @click="dialogsubpage5 = false">Close</v-btn>
                                    <v-btn color="blue darken-1" text @click="dialogsubpage5 = false; createSubPage5()">
                                        Create</v-btn>
                                </v-card-actions>
                            </v-card>
                        </v-dialog>
                    </v-toolbar>
                </template>
            </v-data-table>

            <v-data-table :headers="headerpage6" :items="page6">
                <template v-slot:item.icon="data">
                    <v-icon>{{ data.item.icon }}</v-icon>
                </template>
                <template v-slot:item.actions="data">
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
                        <v-toolbar-title>Page 6
                        </v-toolbar-title>
                        <v-spacer></v-spacer>
                        <v-dialog v-model="dialogpage6" max-width="500px">
                            <template v-slot:activator="{ on, attrs}">
                                <v-btn color="primary" dark class="mb-2" v-bind="attrs" v-on="on">Create</v-btn>
                            </template>
                            <v-card>
                                <v-card-title>Create Slide</v-card-title>
                                <v-card-text>
                                    <v-text-field label="Title" v-model="formpage6.title"></v-text-field>
                                </v-card-text>
                                <v-card-actions>
                                    <v-btn color="blue darken-1" text @click="dialogpage6 = false">Close</v-btn>
                                    <v-btn color="blue darken-1" text @click="dialogpage6 = false; createPage6()">Create
                                    </v-btn>
                                </v-card-actions>
                            </v-card>
                        </v-dialog>
                    </v-toolbar>
                </template>
            </v-data-table>

            <v-data-table :headers="headersubpage6" :items="sub_page6">
                <template v-slot:item.image="data">
                    <v-img :src="'/images/home/subpage6/'+data.item.image" :width="100" :height="100" class="mr-4">
                    </v-img>
                </template>
                <template v-slot:item.actions="data">
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
                        <v-toolbar-title>Sub Page 6
                        </v-toolbar-title>
                        <v-spacer></v-spacer>
                        <v-dialog v-model="dialogsubpage6" max-width="500px">
                            <template v-slot:activator="{ on, attrs}">
                                <v-btn color="primary" dark class="mb-2" v-bind="attrs" v-on="on">Create</v-btn>
                            </template>
                            <v-card>
                                <v-card-title>Create Slide</v-card-title>
                                <v-card-text>
                                    <v-text-field label="Title" v-model="formsubpage6.title"></v-text-field>
                                    <v-text-field label="People Name" v-model="formsubpage6.people_name"></v-text-field>
                                    <v-text-field label="People Position" v-model="formsubpage6.people_position">
                                    </v-text-field>
                                    <v-file-input accept="image/*" v-model="formsubpage6.image" label="Image">
                                    </v-file-input>
                                </v-card-text>
                                <v-card-actions>
                                    <v-btn color="blue darken-1" text @click="dialogsubpage6 = false">Close</v-btn>
                                    <v-btn color="blue darken-1" text @click="dialogsubpage6 = false; createSubPage6()">
                                        Create</v-btn>
                                </v-card-actions>
                            </v-card>
                        </v-dialog>
                    </v-toolbar>
                </template>
            </v-data-table>

            <v-data-table :headers="headerpage7" :items="page7">
                <template v-slot:item.actions="data">
                    <v-tooltip bottom>
                        <template v-slot:activator="{ on }">
                            <v-btn icon v-on="on" @click="editPage7(data.index)">
                                <v-icon>mdi-pencil</v-icon>
                            </v-btn>
                        </template>
                        <span>Edit</span>
                    </v-tooltip>
                    <v-tooltip bottom>
                        <template v-slot:activator="{ on }">
                            <v-btn icon v-on="on" @click="hapusPage7(data.index)">
                                <v-icon>mdi-delete</v-icon>
                            </v-btn>
                        </template>
                        <span>Delete</span>
                    </v-tooltip>
                </template>
                <template v-slot:top>
                    <v-toolbar flat>
                        <v-toolbar-title>Page 7
                        </v-toolbar-title>
                        <v-spacer></v-spacer>
                        <v-dialog v-model="dialogpage7" max-width="500px">
                            <template v-slot:activator="{ on, attrs}">
                                <v-btn color="primary" dark class="mb-2" v-bind="attrs" v-on="on">Create</v-btn>
                            </template>
                            <v-card>
                                <v-card-title>Create Slide</v-card-title>
                                <v-card-text>
                                    <v-text-field label="Title" v-model="formpage7.title"></v-text-field>
                                    <v-text-field label="Subtitle" v-model="formpage7.subtitle"></v-text-field>
                                </v-card-text>
                                <v-card-actions>
                                    <v-btn color="blue darken-1" text @click="dialogpage7 = false">Close</v-btn>
                                    <v-btn color="blue darken-1" text @click="dialogpage7 = false; createPage7()">Create
                                    </v-btn>
                                </v-card-actions>
                            </v-card>
                        </v-dialog>
                    </v-toolbar>
                </template>
            </v-data-table>

            <v-data-table :headers="headernews" :items="news">
                <template v-slot:item.image="data">
                    <v-img :src="'/images/home/news/'+data.item.image" :width="100" :height="100" class="mr-4"></v-img>
                </template>
                <template v-slot:item.actions="data">
                    <v-tooltip bottom>
                        <template v-slot:activator="{ on }">
                            <v-btn icon v-on="on" @click="editNews(data.index)">
                                <v-icon>mdi-pencil</v-icon>
                            </v-btn>
                        </template>
                        <span>Edit</span>
                    </v-tooltip>
                    <v-tooltip bottom>
                        <template v-slot:activator="{ on }">
                            <v-btn icon v-on="on" @click="hapusNews(data.index)">
                                <v-icon>mdi-delete</v-icon>
                            </v-btn>
                        </template>
                        <span>Delete</span>
                    </v-tooltip>
                </template>
                <template v-slot:top>
                    <v-toolbar flat>
                        <v-toolbar-title>News
                        </v-toolbar-title>
                        <v-spacer></v-spacer>
                        <v-dialog v-model="dialognews" max-width="500px">
                            <template v-slot:activator="{ on, attrs}">
                                <v-btn color="primary" dark class="mb-2" v-bind="attrs" v-on="on">Create</v-btn>
                            </template>
                            <v-card>
                                <v-card-title>Create Slide</v-card-title>
                                <v-card-text>
                                    <v-text-field label="Number" v-model="formnews.number"></v-text-field>
                                    <v-text-field label="Title" v-model="formnews.title"></v-text-field>
                                    <v-text-field label="Subtitle" v-model="formnews.subtitle"></v-text-field>
                                    <v-text-field label="Category News" v-model="formnews.category_news"></v-text-field>
                                    <v-menu ref="menu2" v-model="menu2" transition="scale-transition" offset-y
                                        min-width="auto">
                                        <template v-slot:activator="{ on, attrs }">
                                            <v-text-field v-model="formnews.date" label="Picker in menu"
                                                prepend-icon="mdi-calendar" readonly v-bind="attrs" v-on="on">
                                            </v-text-field>
                                        </template>
                                        <v-date-picker v-model="formnews.date" no-title scrollable>
                                            <v-spacer></v-spacer>
                                            <v-btn text color="primary" @click="menu2 = false">
                                                Cancel
                                            </v-btn>
                                            <v-btn text color="primary" @click="$refs.menu2.save(date)">
                                                OK
                                            </v-btn>
                                        </v-date-picker>
                                    </v-menu>
                                    <v-file-input accept="image/*" v-model="formnews.image" label="Image">
                                    </v-file-input>
                                </v-card-text>
                                <v-card-actions>
                                    <v-btn color="blue darken-1" text @click="dialognews = false">Close</v-btn>
                                    <v-btn color="blue darken-1" text @click="dialognews = false; createNews()">Create
                                    </v-btn>
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
                loading: true,
                menu2: false,
                slides: [],
                dialogslide: false,
                headerslides: [
                    { text: 'Title', value: 'title' },
                    { text: 'Subtitle', value: 'subtitle' },
                    { text: 'Image', value: 'image' },
                    { text: 'Actions', value: 'actions', sortable: false },
                ],
                formslides: {
                    id: '',
                    title: '',
                    subtitle: '',
                    image: '',
                },

                images_slides: [],
                dialogimageslide: false,
                headersimageslide: [
                    { text: 'Image', value: 'image' },
                    { text: 'Actions', value: 'actions', sortable: false },
                ],
                formimageslide: {
                    id: '',
                    image: '',
                },

                page2: [],
                dialogpage2: false,
                headerpage2: [
                    { text: 'Title', value: 'title' },
                    { text: 'Subtitle', value: 'subtitle' },
                    { text: 'Actions', value: 'actions', sortable: false },
                ],
                formpage2: {
                    id: '',
                    title: '',
                    subtitle: '',
                },

                page3: [],
                dialogpage3: false,
                headerpage3: [
                    { text: 'Title', value: 'title' },
                    { text: 'Subtitle', value: 'subtitle' },
                    { text: 'Image', value: 'image' },
                    { text: 'Actions', value: 'actions', sortable: false },
                ],
                formpage3: {
                    id: '',
                    title: '',
                    subtitle: '',
                    image: '',
                },

                sub_page3: [],
                dialogsubpage3: false,
                headersubpage3: [
                    { text: 'Icon', value: 'icon' },
                    { text: 'Title', value: 'title' },
                    { text: 'Subtitle', value: 'subtitle' },
                    { text: 'Actions', value: 'actions', sortable: false },
                ],
                formsubpage3: {
                    id: '',
                    title: '',
                    subtitle: '',
                    icon: '',
                },

                page4: [],
                dialogpage4: false,
                headerpage4: [
                    { text: 'Title', value: 'title' },
                    { text: 'Subtitle 1', value: 'subtitle1' },
                    { text: 'Subtitle 1', value: 'subtitle2' },
                    { text: 'Actions', value: 'actions', sortable: false },
                ],
                formpage4: {
                    id: '',
                    title: '',
                    subtitle1: '',
                    subtitle2: '',
                },

                services: [],
                dialogservices: false,
                headerservices: [
                    { text: 'Icon', value: 'icon' },
                    { text: 'Title', value: 'title' },
                    { text: 'Subtitle', value: 'subtitle' },
                    { text: 'Actions', value: 'actions', sortable: false },
                ],
                formservices: {
                    id: '',
                    title: '',
                    subtitle: '',
                    icon: '',
                },

                progress: [],
                dialogprogress: false,
                headerprogress: [
                    { text: 'Number', value: 'number' },
                    { text: 'Title', value: 'title' },
                    { text: 'Subtitle', value: 'subtitle' },
                    { text: 'Actions', value: 'actions', sortable: false },
                ],
                formprogress: {
                    id: '',
                    number: '',
                    title: '',
                    subtitle: '',
                },

                page5: [],
                dialogpage5: false,
                headerpage5: [
                    { text: 'Title', value: 'title' },
                    { text: 'Subtitle', value: 'subtitle' },
                    { text: 'Actions', value: 'actions', sortable: false },
                ],
                formpage5: {
                    id: '',
                    title: '',
                    subtitle: '',
                },

                sub_page5: [],
                dialogsubpage5: false,
                headersubpage5: [
                    { text: 'Icon', value: 'icon' },
                    { text: 'Title', value: 'title' },
                    { text: 'Subtitle', value: 'subtitle' },
                    { text: 'Actions', value: 'actions', sortable: false },
                ],
                formsubpage5: {
                    id: '',
                    title: '',
                    subtitle: '',
                    icon: '',
                },

                page6: [],
                dialogpage6: false,
                headerpage6: [
                    { text: 'Title', value: 'title' },
                    { text: 'Actions', value: 'actions', sortable: false },
                ],
                formpage6: {
                    id: '',
                    title: '',
                },

                sub_page6: [],
                dialogsubpage6: false,
                headersubpage6: [
                    { text: 'Title', value: 'title' },
                    { text: 'People Name', value: 'people_name' },
                    { text: 'People Position', value: 'people_position' },
                    { text: 'Image', value: 'image' },
                    { text: 'Actions', value: 'actions', sortable: false },
                ],
                formsubpage6: {
                    id: '',
                    title: '',
                    people_name: '',
                    people_position: '',
                    image: '',
                },

                page7: [],
                dialogpage7: false,
                headerpage7: [
                    { text: 'Title', value: 'title' },
                    { text: 'Subtitle', value: 'subtitle' },
                    { text: 'Actions', value: 'actions', sortable: false },
                ],
                formpage7: {
                    id: '',
                    title: '',
                    subtitle: '',
                },

                news: [],
                dialognews: false,
                headernews: [
                    { text: 'Number', value: 'number' },
                    { text: 'Category News', value: 'category_news' },
                    { text: 'Date', value: 'date' },
                    { text: 'Title', value: 'title' },
                    { text: 'Subtitle', value: 'subtitle' },
                    { text: 'Image', value: 'image' },
                    { text: 'Actions', value: 'actions', sortable: false },
                ],
                formnews: {
                    id: '',
                    number: '',
                    category_news: '',
                    date: '',
                    title: '',
                    subtitle: '',
                    image: '',
                },
        }
    },
    methods: {
        async loadData() {
        try {
            this.loading = true
            await axios.get('/api/home/slides').then(res => {
                this.slides = res.data
            })
            await axios.get('/api/home/images_slides').then(res => {
                this.images_slides = res.data
            })
            await axios.get('/api/home/page2').then(res => {
                this.page2 = res.data
            })
            await axios.get('/api/home/page3').then(res => {
                this.page3 = res.data
            })
            await axios.get('/api/home/sub_page3').then(res => {
                this.sub_page3 = res.data
            })
            await axios.get('/api/home/page4').then(res => {
                this.page4 = res.data
            })
            await axios.get('/api/home/services').then(res => {
                this.services = res.data
            })
            await axios.get('/api/home/progress').then(res => {
                this.progress = res.data
            })
            await axios.get('/api/home/page5').then(res => {
                this.page5 = res.data
            })
            await axios.get('/api/home/sub_page5').then(res => {
                this.sub_page5 = res.data
            })
            await axios.get('/api/home/page6').then(res => {
                this.page6 = res.data
            })
            await axios.get('/api/home/sub_page6').then(res => {
                this.sub_page6 = res.data
            })
            await axios.get('/api/home/page7').then(res => {
                this.page7 = res.data
            })
            await axios.get('/api/home/news').then(res => {
                this.news = res.data
            })
            this.loading = false
        } catch (error) {
            console.log(error)
        }
    },
    
    async createHeaderSlide() {
        try {
            var formData = new FormData()
            formData.append('id', this.formslides.id)
            formData.append('title', this.formslides.title)
            formData.append('subtitle', this.formslides.subtitle)
            formData.append('image', this.formslides.image)
            await axios.post('/api/postHome/slides', formData).then(res => {
                this.loadData();
                this.formslides = {
                    id: '',
                    title: '',
                    subtitle: '',
                    image: '',
                }
            })
        } catch (error) {
            console.log(error)
        }
    },

    editSlide(index) {
        this.formslides = this.slides[index]
        this.dialogslide = true
    },
        async hapusSlide(index) {
        try {
            await axios.post('/api/postHome/slidesDelete', this.slides[index]).then(res => {
                this.slides.splice(index, 1);
            })
        } catch (error) {
            console.log(error)
        }
    },

    async createImageSlide(){
        try {
            var formData = new FormData()
            formData.append('id', this.formimageslide.id)
            formData.append('image', this.formimageslide.image)
            await axios.post('/api/postHome/images_slides', formData).then(res => {
                this.loadData();
                this.formimageslide = {
                    id: '',
                    image: '',
                }
            })
        } catch (error) {
            console.log(error)
        }
    },

        editImageSlide(index) {
            this.formimageslide = this.images_slides[index]
            this.dialogimageslide = true
        },
            async hapusImageSlide(index) {
            try {
                await axios.post('/api/postHome/images_slidesDelete', this.images_slides[index]).then(res => {
                    this.images_slides.splice(index, 1);
                })
            } catch (error) {
                console.log(error)
            }
        },

        async createPage2(){
            try {
                await axios.post('/api/postHome/page2', this.formpage2).then(res => {
                    this.loadData();
                    this.formpage2 = {
                        id: '',
                        title: '',
                        subtitle: '',
                    }
                })
            } catch (error) {
                console.log(error)
            }
        },

        editPage2(index) {
            this.formpage2 = this.page2[index]
            this.dialogpage2 = true
        },
        async hapusPage2(index) {
            try {
                await axios.post('/api/postHome/page2Delete', this.page2[index]).then(res => {
                    this.page2.splice(index, 1);
                })
            } catch (error) {
                console.log(error)
            }
        },

        async createPage3(){
            try {
                var formData = new FormData()
                formData.append('id', this.formpage3.id)
                formData.append('title', this.formpage3.title)
                formData.append('subtitle', this.formpage3.subtitle)
                formData.append('image', this.formpage3.image)
                await axios.post('/api/postHome/page3', formData).then(res => {
                    this.loadData();
                    this.formpage3 = {
                        id: '',
                        title: '',
                        subtitle: '',
                        image: '',
                    }
                })
            } catch (error) {
                console.log(error)
            }
        },
        editPage3(index) {
            this.formpage3 = this.page3[index]
            this.dialogpage3 = true
        },
        async hapusPage3(index) {
            try {
                await axios.post('/api/postHome/page3Delete', this.page3[index]).then(res => {
                    this.page3.splice(index, 1);
                })
            } catch (error) {
                console.log(error)
            }
        },

        async createSubPage3(){
            try {
                await axios.post('/api/postHome/sub_page3', this.formsubpage3).then(res => {
                    this.loadData();
                    this.formsubpage3 = {
                        id: '',
                        title: '',
                        subtitle: '',
                        icon: '',
                    }
                })
            } catch (error) {
                console.log(error)
            }
        },

        editSubPage3(index) {
            this.formsubpage3 = this.sub_page3[index]
            this.dialogsubpage3 = true
        },

        async hapusSubPage3(index) {
            try {
                await axios.post('/api/postHome/sub_page3Delete', this.sub_page3[index]).then(res => {
                    this.sub_page3.splice(index, 1);
                })
            } catch (error) {
                console.log(error)
            }
        },

        async createPage4(){
            try {
                await axios.post('/api/postHome/page4', this.formpage4).then(res => {
                    this.loadData();
                    this.formpage4 = {
                        id: '',
                        title: '',
                        subtitle1: '',
                        subtitle2: '',
                    }
                })
            } catch (error) {
                console.log(error)
            }
        },

        editPage4(index) {
            this.formpage4 = this.page4[index]
            this.dialogpage4 = true
        },
        async hapusPage4(index) {
            try {
                await axios.post('/api/postHome/page4Delete', this.page4[index]).then(res => {
                    this.page4.splice(index, 1);
                })
            } catch (error) {
                console.log(error)
            }
        },

        async createServices(){
            try {
                await axios.post('/api/postHome/services', this.formservices).then(res => {
                    this.loadData();
                    this.formservices = {
                        id: '',
                        title: '',
                        subtitle: '',
                        icon: '',
                    }
                })
            } catch (error) {
                console.log(error)
            }
        },

        editServices(index) {
            this.formservices = this.services[index]
            this.dialogservices = true
        },

        async hapusServices(index) {
            try {
                await axios.post('/api/postHome/servicesDelete', this.services[index]).then(res => {
                    this.services.splice(index, 1);
                })
            } catch (error) {
                console.log(error)
            }
        },

        async createProgress(){
            try {
                await axios.post('/api/postHome/progress', this.formprogress).then(res => {
                    this.loadData();
                    this.formprogress = {
                        id: '',
                        number: '',
                        title: '',
                        subtitle: '',
                    }
                })
            } catch (error) {
                console.log(error)
            }
        },

        editProgress(index) {
            this.formprogress = this.progress[index]
            this.dialogprogress = true
        },

        async hapusProgress(index) {
            try {
                await axios.post('/api/postHome/progressDelete', this.progress[index]).then(res => {
                    this.progress.splice(index, 1);
                })
            } catch (error) {
                console.log(error)
            }
        },
        
        async createPage5(){
            try {
                await axios.post('/api/postHome/page5', this.formpage5).then(res => {
                    this.loadData();
                    this.formpage5 = {
                        id: '',
                        title: '',
                        subtitle: '',
                    }
                })
            } catch (error) {
                console.log(error)
            }
        },

        editPage5(index) {
            this.formpage5 = this.page5[index]
            this.dialogpage5 = true
        },

        async hapusPage5(index) {
            try {
                await axios.post('/api/postHome/page5Delete', this.page5[index]).then(res => {
                    this.page5.splice(index, 1);
                })
            } catch (error) {
                console.log(error)
            }
        },

        async createPage6(){
            try {
                await axios.post('/api/postHome/page6', this.formpage6).then(res => {
                    this.loadData();
                    this.formpage6 = {
                        id: '',
                        title: '',
                        subtitle: '',
                    }
                })
            } catch (error) {
                console.log(error)
            }
        },
        editPage6(index) {
            this.formpage6 = this.page6[index]
            this.dialogpage6 = true
        },
        async hapusPage6(index) {
            try {
                await axios.post('/api/postHome/page6Delete', this.page6[index]).then(res => {
                    this.page6.splice(index, 1);
                })
            } catch (error) {
                console.log(error)
            }
        },
        async createSubPage6(){
            try {
                var formData = new FormData();
                formData.append('id', this.formsubpage6.id);
                formData.append('image', this.formsubpage6.image);
                formData.append('title', this.formsubpage6.title);
                formData.append('people_name', this.formsubpage6.people_name);
                formData.append('people_position', this.formsubpage6.people_position);
                await axios.post('/api/postHome/sub_page6', formData).then(res => {
                    this.loadData();
                    this.formsubpage6 = {
                        id: '',
                        title: '',
                        people_name: '',
                        people_position: '',
                        image: '',
                    }
                })
            } catch (error) {
                console.log(error)
            }
        },

        editSubPage6(index) {
            this.formsubpage6 = this.sub_page6[index]
            this.dialogsubpage6 = true
        },

        async hapusSubPage6(index) {
            try {
                await axios.post('/api/postHome/sub_page6Delete', this.sub_page6[index]).then(res => {
                    this.sub_page6.splice(index, 1);
                })
            } catch (error) {
                console.log(error)
            }
        },

        async createPage7(){
            try {
                await axios.post('/api/postHome/page7', this.formpage7).then(res => {
                    this.loadData();
                    this.formpage7 = {
                        id: '',
                        title: '',
                        subtitle: '',
                    }
                })
            } catch (error) {
                console.log(error)
            }
        },
        editPage7(index) {
            this.formpage7 = this.page7[index]
            this.dialogpage7 = true
        },
        async hapusPage7(index) {
            try {
                await axios.post('/api/postHome/page7Delete', this.page7[index]).then(res => {
                    this.page7.splice(index, 1);
                })
            } catch (error) {
                console.log(error)
            }
        },

        async createNews(){
            try {
                var formData = new FormData();
                formData.append('id', this.formnews.id);
                formData.append('image', this.formnews.image);
                formData.append('title', this.formnews.title);
                formData.append('subtitle', this.formnews.subtitle);
                formData.append('date', this.formnews.date);
                formData.append('number', this.formnews.number);
                formData.append('category_news', this.formnews.category_news);
                await axios.post('/api/postHome/news', formData).then(res => {
                    this.loadData();
                    this.formnews = {
                        id: '',
                        number: '',
                        category_news: '',
                        date: '',
                        title: '',
                        subtitle: '',
                        image: '',
                    }
                })
            } catch (error) {
                console.log(error)
            }
        },

        editNews(index) {
            this.formnews = this.news[index]
            this.dialognews = true
        },

        async hapusNews(index) {
            try {
                await axios.post('/api/postHome/newsDelete', this.news[index]).then(res => {
                    this.news.splice(index, 1);
                })
            } catch (error) {
                console.log(error)
            }
        },
        
    },


    mounted() {
        this.loadData()
    },
}
</script>