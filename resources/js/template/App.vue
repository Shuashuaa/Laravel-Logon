<template>
   <v-app>
      <v-app-bar app clipped-left elevation="1">
         <!-- the account tab will go here -->
         <v-icon>mdi-account</v-icon>
         &nbsp;
         <!-- <h4>olleh, evol!</h4> -->
         <h3>olleh,</h3>
         &nbsp;
         <h3><b>{{authUserName}}!</b></h3>
         <!-- this is the last -->
         <v-spacer></v-spacer>

         <v-toolbar-title>PPA HSOJ</v-toolbar-title>
         
         <v-spacer></v-spacer>
         <h4>htiw detaerc</h4>
         &nbsp;
         <!-- oops, you stole my heart again! heartheart icon -->
         <v-btn v-on:dblclick="randomize" icon>
            <v-icon>mdi-heart</v-icon>
            <!-- <h1>{{Messages[MessagesIndex]}}</h1> -->
         </v-btn>
         &nbsp;
         <h4>yb</h4>
         &nbsp;
         <h4>ylurt sruoy</h4>
      </v-app-bar>

      <v-navigation-drawer
      v-model="drawer"
      app mini-variant expand-on-hover clipped
      >
         <v-list dense style="height: 100%;">
               <v-list-item
                  v-for="(item, i) in items"
                  :key="i"
                  :to="item.to"
               >
                  <v-list-item-icon>
                     <v-icon v-text="item.icon"></v-icon>
                  </v-list-item-icon>
                  <v-list-item-content>
                     <v-list-item-title v-text="item.text"></v-list-item-title>
                  </v-list-item-content>
               </v-list-item>

               <v-card elevation="0" height="70%"></v-card>

               <a href="/logout">
                  <!-- <v-btn style="margin-left: 10px" icon> -->
                     <!-- <v-icon>mdi-logout</v-icon>
                     </v-btn>-->

                  <v-btn style="margin-left: 8px; margin-right: 0; background-color: white; text-decoration: none; width: 250px" depressed>
                     <v-list-item-icon>
                        <v-icon>mdi-logout</v-icon>
                     </v-list-item-icon>
                     <v-list-item-content>
                        <v-list-item-title style="margin-right: 100px;">logout</v-list-item-title>
                     </v-list-item-content>
                  </v-btn>   
               </a>

         </v-list>
          
      </v-navigation-drawer>
      
      <v-main class="ma-2">

         <v-container>
            <center>
               <v-toolbar
                  width="1000"
                  elevation="1"
               ><h2>Your Projects</h2></v-toolbar>

               <h3><b>{{documentsArr}}</b></h3> 

               <v-simple-table
               style="padding: 20px; width: 1000px;"
               fixed-header
               elevation="1"
               >
                     <template v-slot:default>
                        <thead>
                           <tr>
                           <th class="th_titles">No.</th>   
                           <th class="th_titles">
                              Obsoleted Date
                           </th>   
                           <th class="th_titles">
                              System Name
                           </th>
                           <th class="th_titles">
                              Date Added
                           </th>
                           <th class="th_action">
                              Actions
                           </th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr v-for="(item, i) in documentsArr" :key="i"
                           >
                           <!-- for checking of 'ids' -->
                           <!-- <td>{{ item.id }}</td> -->
                           <td>{{ 1 + i++ }}</td>
                           <td>{{ item.obsolete_date }}</td>
                           <td>{{ item.document_name }}</td>
                           <td>{{ item.created_at | moment}}</td>
                           <td>
                              <v-btn 
                                 icon
                                 @click="editSystem(item.id), dialog1 = true"
                              >
                                 <v-icon>mdi-pencil</v-icon>
                              </v-btn>
                              
                              <v-btn 
                                 icon
                                 @click="deleteDocu(item.id)"
                              >
                                 <v-icon>mdi-delete</v-icon>
                              </v-btn>

                           </td>
                           </tr>
                        </tbody>
                     </template>
               </v-simple-table>

               <template>
               <div class="text-center">
                  <v-dialog
                     v-model="dialog"
                     width="500"
                  >
                     <template v-slot:activator="{ on, attrs }">
                     <v-btn
                        color="red lighten-2"
                        dark
                        style="margin-top: 10px; margin-right: 840px !important; background-color: blue;"
                        v-bind="attrs"
                        v-on="on"
                     >
                        Add System
                        <v-icon>mdi-plus</v-icon>
                     </v-btn>
                     </template>

                     <v-card>
                     <v-card-title 
                        id="font" 
                        style=" font-family: 'Dosis', sans-serif !important;"
                        class="text-h5 red lighten-2"
                        ><b>
                        Add System
                        </b>
                     </v-card-title>

                     <v-card-text>
                        <h3 style="margin-top: 20px;"><b>Document Code</b></h3>
                        <p style="font-size: 18px;
                                 border: 1px solid grey; 
                                 border-radius: 3px; 
                                 padding-left: 11px;
                                 padding-top: 7px; 
                                 padding-bottom: 7px; 
                                 margin-top: 2px;
                                 color: grey;"
                        >{{authCode}}</p>

                        <h3 style="margin-top: 20px;"><b>System Name</b></h3>
                        <v-text-field
                           id="font"
                           style="margin-top: 2px;"
                           v-model="documentName"
                           v-on:keyup.enter="addSystem()"
                           outlined
                           dense
                        ></v-text-field>

                        <h3 style="margin-top: 0px;"><b>Obsoleted Date</b></h3>
                        <v-date-picker 
                           id="font"
                           style="margin-top: 2px;"
                           full-width
                           v-model="obsoleteDate"
                           color="red lighten-3"
                           header-color="red lighten-2"
                        ></v-date-picker>

                        <v-text-field
                           id="font"
                           style="margin-top: 5px;"
                           v-model="obsoleteDate"
                           outlined
                           dense
                           disabled
                        ></v-text-field>
                     </v-card-text>

                     <v-divider></v-divider>

                     <v-card-actions>
                        <v-spacer></v-spacer>
                        <v-btn
                           v-on:keyup="addSystem()"
                           style="background-color: #ec9c9c;"
                           dark
                           @click="addSystem(), dialog = false"
                        >
                           Save 
                           <v-icon>mdi-content-save-outline</v-icon>
                        </v-btn>
                     </v-card-actions>
                     </v-card>
                  </v-dialog>
               </div>
               </template>

               <v-dialog
                  v-model="dialog1"
                  width="500"
               >
                  <v-card>
                     <v-card-title
                        color="red lighten-2"
                        style=" font-family: 'Dosis', sans-serif !important;"
                        class="text-h5 red lighten-2"
                     ><b>Edit System info</b>   
                     </v-card-title>

                     <v-card-text>
                        <v-text-field
                           label="Acquired date"
                           style="margin-top: 15px;"
                           dense
                           outlined
                           v-model="editDocumentsArr.obsolete_date"
                        ></v-text-field>
                        <v-text-field
                           label="System name"
                           dense
                           outlined
                           v-model="editDocumentsArr.document_name"
                        ></v-text-field>
                     </v-card-text>

                     <v-divider></v-divider>

                     <v-card-actions>
                        <v-spacer></v-spacer>
                        <v-btn
                           color="#ec9c9c"
                           @click="dialog1 = false"
                        >
                           Save
                           <v-icon>mdi-content-save-outline</v-icon>
                        </v-btn>
                     </v-card-actions>
                  </v-card>
               </v-dialog>

            </center>

            <v-btn @click="getDate()"></v-btn>
         </v-container>

         <router-view></router-view>
      </v-main>
   </v-app>
</template>


<script>
   import moment from 'moment';
   import Swal from 'sweetalert2';
   export default {
      data: () => ({
         documentName: '',
         obsoleteDate: (new Date(Date.now() - (new Date()).getTimezoneOffset() * 60000)).toISOString().substr(0, 10),

         authUserName: '',
         authCode: '',
         documentsArr: [],
         editDocumentsArr: [],
         

         dialog1: false,
         dialog: false,

         timeline: 'timeline',
         drawer: null,
         items:[
            {text:'Home', icon:'mdi-home', to:'home'},
            {text:'Chart', icon:'mdi-chart-timeline-variant-shimmer', to:'chart'},
            {text:'List', icon:'mdi-format-list-checkbox', to:'list'},
            {text:'Timeline', icon:'mdi-timeline-text-outline', to:'timeline'},
            {text:'ImgPreview', icon:'mdi-file-image', to:'imgPreview'},
         ],
         MessagesIndex: 0,
         Messages: [
      //       'Oops!, you stole my heart again..',
      //       "You're my Honeybunch, Sugarplum Pumpy-umpy-umpkin",
      //       "You're my sweetie pie. You're my Cuppycake Gumdrop Snoogums-Boogums You're the Apple of my Eye",
      //       'For you, I would get beat to smithereens',
      //       "Ugh uh, stop tapping my heart or should i say more?",
      //       "She's the tear in my heart, she's a carver, She's a butcher with a smile, cut me farther, Than I've ever beeeeeeeeen",
      //       "ha! you found me! come heeere huggyhughug",
      //       "Will you be my baby?"
        ]
      }),

      methods: {

         getDate(){ // playground
            this.$store.commit('setAuthDocu', window.auth_documents);
            // console.log (this.$store.getters.documents);
            this.documentsArr = this.$store.getters.documents;
            // this.documentsArr = moment(this.$store.getters.documents.created_at).format('YYYY-MM-DD');

            // let arr = [];

            this.documentsArr.forEach((value, index) => {

               let created_date = (value.created_at);

               let newVal = moment(created_date).format('MM/DD/YY');


               this.documentsArr.push(newVal);
               // arr.push(newVal);

               // console.log(value.created_at);
               console.log(newVal);

               
            });

            // console.log(this.created_date)
            // console.log(this.documentsArr)
         },

         addSystem(){

            if(this.documentName == ''){
               alert(" System name is empty! ");
            }else{
               axios({
                  method: 'Post',
                  url: '/addSystem',
                  data: {
                     documentName : this.documentName,
                     obsoleteDate : this.obsoleteDate
                  }
               }).then((res)=>{
                  console.log(res.data);

                  this.documentName = null;
                  this.obsoleteDate = null;

                  Swal.fire({
                     icon: 'success',
                     title: "Added!",
                     text: "Your obsolete pattern has been successfully Added!",
                     type: "success"

                  }).then(function() {
                     window.location.reload();
                  });
                  
               })
            }
         },

         editSystem(id){
            axios({
               method: 'get',
               url: `/editSystem/${id}`
            }).then((res)=>{
               let document = this.documentsArr.map(item => item.id).indexOf(id);
               this.editDocumentsArr = res.data

               console.log(res.data)
            })

         },

         // updateSystem(id){
         //    axios({
         //       method: 'post',
         //       url: `/updateSystem/${id}`,
         //       data:{

         //       }
         //    }).then((res)=>{
         //       console.log(res)
         //    })
         // },

         deleteDocu(id){
            axios({
               method: 'Post',
               url: `/deleteDocu/${id}`
            }).then((res)=>{
               let document = this.documentsArr.map(item => item.id).indexOf(id);
               this.documentsArr.splice(document, 1);
               console.log(document)

               Swal.fire(
                  'Deleted!',
                  'Your obsolete pattern has been deleted.',
                  'success'
               )
            })
         },

         randomize() {
            this.MessagesIndex = Math.floor(Math.random() * (this.Messages.length));
            // alert();

               Swal.fire({
               title: this.Messages[this.MessagesIndex],
               width: 600,
               confirmButtonText: 'Yes',
               padding: '3em',
               color: '#716add',
               background: '#fff url(/images/trees.png)',
               backdrop: `
               rgba(0,0,123,0.4)
               url("/images/nyan-cat.gif")
               left top
               no-repeat
            `
            })
         },

         moment: function () {
            return moment();
         }

      },

      filters: {
         moment: function (date) {
            return moment(date).format('MM/DD/YYYY');
         }
      },

      mounted() {
            // for users
            this.$store.commit('setAuthUser', window.auth_user); //validate the user credentials
            console.log (this.$store.getters.isLoggedIn); //return the visual value from controller
            this.authUserName = this.$store.getters.isLoggedIn; //give the authUserName the value of $store
            
            // for code
            this.$store.commit('setAuthCode', window.auth_code);
            console.log (this.$store.getters.isLoggedInCode);
            this.authCode = this.$store.getters.isLoggedInCode;

            // for documents
            this.$store.commit('setAuthDocu', window.auth_documents);
            console.log (this.$store.getters.documents);
            this.documentsArr = this.$store.getters.documents;

            // this.documentsArr = moment(this.$store.getters.documents.created_at).utc().format('MM/DD/YYYY');
         }
   }
</script>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700;800&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Dosis:wght@200;300;400;500;600;700;800&display=swap');

    #font{
      font-family: 'Dosis', sans-serif;
    }

    .v-toolbar__title{
      font-weight: 600 !important;
      font-family: 'Dosis', sans-serif;
    }

    .timeline{
      padding-right: 200px;
      font-weight: 600 !important;
      font-family: 'Dosis', sans-serif;
    }

    .v-list--dense .v-list-item .v-list-item__title{
      font-weight: 600 !important;
      font-family: 'Montserrat', sans-serif;
    }
    .v-card__title{
      background-color: #f0a09b;
    }
    b{
      font-weight: 600 !important;
      font-family: 'Dosis', sans-serif;
    }
    h2{
      font-weight: 600 !important;
      font-family: 'Dosis', sans-serif;
    }  
    h3{
      font-weight: 300 !important;
      font-family: 'Dosis', sans-serif;
    }
    h4,h5,h6,p{
      font-family: 'Dosis', sans-serif;
    }
    th{
      font-weight: 600 !important;
      font-family: 'Dosis', sans-serif;
      font-size: 15px !important;
    }
    td{
      font-weight: 300 !important;
      font-family: 'Dosis', sans-serif;
      font-size: 14px !important;
    }

   .v-card__title{
      font-family: 'Dosis', sans-serif;
   }

    #app {   
        background: url('https://i.pinimg.com/originals/54/f8/13/54f81331a9da88c623b96363fb0a4da1.gif')
        /* background: url('https://images.pexels.com/photos/919606/pexels-photo-919606.jpeg') */
    no-repeat center center fixed !important; 
    /* no-repeat; */
    background-size: 100% !important;
    }  
    .v-app-bar{
        /* max-width: 1280px !important; */
        /* height: 60px !important; */
        margin: 0 auto !important;
    }
    .v-app{
        max-width: 1024px !important;
    }
    .app-bar-category-Menu, 
    .app-bar-category-Apps{
        margin-right: 5px;
    }
    .app-bar-category-about{
        margin-right: 20px;
    }

</style>


// https://readerstacks.com/laravel-8-custom-login-and-registration-with-example/