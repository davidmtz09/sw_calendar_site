<template>
  <app-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Calendario</h2>
    </template>
    <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <Calendar @dateClick="dateClick"/>
                </div>
            </div>
        </div>
        <modal-calendar v-if="showModal" :form="newEvent" @closeModal="closeModal" @saveAppt="saveAppt"/>
  </app-layout>
</template>

<script>
import AppLayout from "../../Layouts/AppLayout.vue";
import Calendar from "../../Components/Calendar.vue";
import ModalCalendar from "../../Components/Modals/CalendarModal.vue";
import formatTime from "../../Mixins/transformTime";
import { Inertia } from "@inertiajs/inertia";

export default {
  name: "Books",
  props:{
  },
  components: {
    Calendar,
    AppLayout,
    ModalCalendar,
  },
  computed:{
    showAlert(){
      if(this.$page.flash.success !== null){
        setTimeout(()=>{
            this.$page.flash.success = null
          },3000)
          return true
      }
      return false
    }
  },
  data(){
    return {
      showModal: false,
      newEvent: {
        title: "",
        desc: "",
        date_at: "",
        hour: "",
        date_end: "",
        hour_end: "",
        session: 1800
      },
    }
  },
  methods:{
    dateClick(arg){
      this.$data.showModal = true;
      this.setModalOpen(arg);
    },
    closeModal(){
      this.$data.showModal = false;
    },
    setModalOpen(obj){
      let dateAndTime = obj.dateStr.split("T");
      this.newEvent.date_at = dateAndTime[0];
      this.newEvent.hour = dateAndTime[1].substr(0, 8);
      return;
    },
    resetModal(){
       this.newEvent = {
        title: "",
        desc: "",
        date_at: "",
        hour: "",
        date_end: "",
        hour_end: "",
        session: 1800
      }
    },
    saveAppt(param){
      if(param.title === ""){
        alert('No puedes dejar el campo Nombre vacio');
      }
      let dataAppt = this.setDurationSesion(param);

      Inertia.post(route('appointment.store'), dataAppt, {
        onSuccess: page => {
          if (Object.entries(page.props.errors).length === 0){
            this.closeModal();
            this.resetModal();
            //emitir evento con eventBus
            $eventBus.$emit('refreshCalendar')
          }
        }
      });
      // capturamos excepciones
      Inertia.on("error", event => {
        event.preventDefault();
        console.log('capturamos este error: ', error.message);
      });
    },
    setDurationSesion(form){
      let dateApt = form.date_at +" "+ form.hour; 
      
      let initSesion = new Date(dateApt); 

      //fecha final
       let dateAptend = form.date_end +" "+ form.hour_end; 

      


       const getSecondsSesion = initSesion.getSeconds() + form.session;

        initSesion.setSeconds(getSecondsSesion);

      return {
        title: form.title,
        desc: form.desc,
        start: dateApt,
        end: dateAptend,
        session: form.session,
        date_at: form.date_at,
        date_end: form.date_end,
        hour: form.hour,
        hour_end: form.hour_end,
      };
    }
   
  

  }
};
</script>

<style>
</style>