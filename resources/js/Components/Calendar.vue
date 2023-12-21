<template>
  <div>
    <fullcalendar :options="calendarOptions"/>
    <!-- <FullCalendar :options="calendarOptions" /> -->
  </div>
</template>

<script>

import Fullcalendar from '@fullcalendar/vue3'
import daygrid from '@fullcalendar/daygrid'
import interactionPlugin from '@fullcalendar/interaction'
import timeGrid from '@fullcalendar/timegrid'
// import route from 'vendor/tightenco/ziggy/src/js'




export default {
    components: {
        Fullcalendar
    },
    data(){
        return{
            calendarOptions: {
                plugins: [ daygrid, interactionPlugin,timeGrid],
                initialView: 'timeGridWeek',
                headerToolbar:{
                    left: 'prev,next,today',
                    center: 'title',
                    right: 'dayGridMonth, timeGridWeek, timeGridDay, dayGridYear'
                },
                allDaySlot: false,
                height: "auto",
                dateClick: this.handleDateClick,
                eventClick: this.handleEventClick, 
            }
        }
    },
    beforeMount(){
        this.calendarOptions.eventClick = this.handleEventClick;
        this.$data.calendarOptions.events = {
            url: route('appointment.index'),
            method: 'GET',
            failure: error=>{
                console.log('tenemos este error: ',error.message);
            }
        }
        
    },
    // mounted(){
    //     eventBus.$on('refreshCalendar', function(){
    //         this.refreshCalendar()
    //     })
    // },
    
    methods:{
        handleDateClick(clickInfo){
            this.$emit('dateClick', clickInfo)
        },
        refreshCalendar(){

        },
        handleEventClick(info) {
      this.$emit("eventClick", info); // Emitir un evento al componente padre
    },
    }

}
</script>

<style>

</style>