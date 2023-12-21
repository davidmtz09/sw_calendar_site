<template>
 <!-- <modal-calendar v-if="showModal" :form="newEvent" @closeModal="closeModal" @saveAppt="saveAppt"/> -->
  <div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
    <div
      class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0"
    >
      <div class="fixed inset-0 transition-opacity">
        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
      </div>
      <!-- This element is to trick the browser into centering the modal contents. -->
      <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​
      <div
        class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
        role="dialog"
        aria-modal="true"
        aria-labelledby="modal-headline"
      >
        <form>
          <div class="flex justify-between border-b border-gray-100 px-5 py-4">
            <div>
              <i class="fas fa-exclamation-circle text-blue-500"></i>
              <span class="font-bold text-gray-700 text-lg">Agregar evento</span>
            </div>
            <div>
              <button>
                <i
                  class="fa fa-times-circle text-red-500 hover:text-red-600 transition duration-150"
                ></i>
              </button>
            </div>
          </div>
          <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
            <div class>
            
              <div class="mb-4">
                <label
                  for="exampleFormControlInput1"
                  class="block text-gray-700 text-sm font-bold mb-2"
                >Nombre:</label>
                <input
                  v-model="form.title"
                  type="text"
                  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                  id="exampleFormControlInput1"
                  placeholder="Nombre del evento"
                  autocomplete="off"
                />
                <!-- <div v-if="$page.errors.title" class="text-red-500">{{ $page.errors.title[0]}}</div> -->
              </div>
              <div class="mb-4">
                <label
                  for="exampleFormControlInput1"
                  class="block text-gray-700 text-sm font-bold mb-2"
                >Descripcion:</label>
                <input
                  v-model="form.desc"
                  type="text"
                  class="shadow appearance-none border rounded w-full py-5 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                  id="exampleFormControlInput1"
                  placeholder="Descripcion"
                  autocomplete="off"
                />
                <!-- <div v-if="$page.errors.title" class="text-red-500">{{ $page.errors.title[0]}}</div> -->
              </div>
              <div class="mb-4">
                <label
                  for="exampleFormControlInput1"
                  class="block text-gray-700 text-sm font-bold mb-2"
                >Inicio</label>
                <input
                  v-model="form.date_at"
                  
                  type="date" 
                  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                  id="exampleFormControlInput1"
                  placeholder="YYYY-MM-DD"
                />
              </div>
              <div class="mb-4">
                <label
                  for="exampleFormControlInput2"
                  class="block text-gray-700 text-sm font-bold mb-2"
                >Hora de inicio</label>
                <input
                  v-model="form.hour"
                  
                  type="time"
                  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                  id="exampleFormControlInput2"
                />
              </div>

              <div class="mb-4">
                <label
                  for="exampleFormControlInput1"
                  class="block text-gray-700 text-sm font-bold mb-2"
                >Final</label>
                <input
                  v-model="form.date_end"
                  
                  type="date" 
                  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                  id="exampleFormControlInput1"
                  placeholder="YYYY-MM-DD"
                />
              </div>
              <div class="mb-4">
                <label
                  for="exampleFormControlInput2"
                  class="block text-gray-700 text-sm font-bold mb-2"
                >Hora final</label>
                <input
                  v-model="form.hour_end"
                  
                  type="time"
                  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                  id="exampleFormControlInput2"
                />
              </div>
            </div>
          </div>
          <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
            <button
              @click.prevent="store(form)"
              type="button"
              class="inline-flex justify-center w-full border border-teal-500 bg-teal-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-teal-600 focus:outline-none focus:shadow-outline"
            >Guardar</button>
            <!-- <button
              type="button"
              class="inline-flex justify-center w-full border border-red-500 text-red-500 rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:text-white hover:bg-red-600 focus:outline-none focus:shadow-outline"
            >Eliminar</button> -->
            <!-- <button
              @click.prevent="closeModal"
              type="button"
              class="inline-flex justify-center w-full border border-gray-200 bg-gray-200 text-gray-700 rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-gray-300 focus:outline-none focus:shadow-outline"
            >atrás</button> -->
          </div>
        </form>
      </div>
    </div>
  </div>
  
</template>

<script>
import { Inertia } from "@inertiajs/inertia";
//import { useForm } from "@inertiajs/vue3";
import { useForm, router } from "@inertiajs/vue3"

// import EditVue from '@/Components/Modals/Edit.vue';
import Calendar from "../../Components/Calendar.vue";
import ModalCalendar from "../../Components/Modals/CalendarModal.vue";
import { reactive } from "vue";
export default {
  name: "Modal",
  props:{
     appointment: Object,
     form:{
      type: Object,
      default: ()=>{}
    }
  },

  components: {
    ModalCalendar,
    Calendar,
  },
  methods: {
  closeModal() {
    this.$emit('closeModal');
  },
  store(form) {
    console.log('ID del evento en el formulario:', form.id);
      // Formatear fechas y horas antes de enviar la solicitud
    this.form.start = `${this.form.date_at} ${this.form.hour}`;
    this.form.end = `${this.form.date_end} ${this.form.hour_end}`;
    Inertia.put(route('appointment.update', form.id), form, {
  onSuccess: page => {
    this.closeModal();
    this.$emit('evento_personalizado', page.data);
  },
  onError: error => {
    console.error(error);
    alert('Hubo un error al actualizar el evento.');
  },
});

  },
  
},

  setup(props){
        const form = useForm({
      id: props.appointment.id,
      title: props.appointment.reason,
      desc: props.appointment.desc,
      start: props.appointment.begin,
      end: props.appointment.end,
      date_at: props.appointment.date_at,
      hour: props.appointment.hour,
      date_end: props.appointment.date_end,
      hour_end: props.appointment.hour_end,
      session: props.appointment.session,
        });

        console.log(form);
    return {
      showModal: false,
      form: form,
    };

    },
  
};
</script>

<style scoped>
.top-100 {
  top: 100%;
}
.bottom-100 {
  bottom: 100%;
}

.max-h-select {
  max-height: 300px;
}
</style>