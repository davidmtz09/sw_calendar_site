<template>
    <app-layout>
        <div class="container">
            <div class="card">
          <div class="card-body">
        <table class="w-full border">
            <thead class="bg-gray-100">
                <tr class="border-b">
                <th class="p-3">Id </th>
                <th class="p-3">Nombre </th>
                <th class="p-3">Descripcion </th>
                <th class="p-3">Fecha de Inicio </th>
                <th class="p-3">Fecha Fin </th>
                <th class="p-3">Actions </th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-b" v-for="c in appointments.data" :key="c.id">
                    <td class="p-2">{{ c.id }}</td>
                    <td class="p-2">{{ c.reason }}</td>
                    <td class="p-2">{{ c.desc }}</td>
                    <td class="p-2">{{ c.begin }}</td>
                    <td class="p-2">{{ c.end }}</td>
                    <td class="p-2">
                    <Link class="text-sm text-green-700 hover:text-green-900" :href="route('appointment.edit', c.id)">Edit</Link>
                    <Link as="button" type="button" method="DELETE" class="text-sm text-red-700 hover:text-red-900 ml-2" :href="route('appointment.destroy', c.id)">Delete</Link>
                </td>
                </tr>
            </tbody>
        </table>

<pagination class="my-4" :links="appointments" />
</div>
</div>
</div>
    </app-layout>
</template>

<script>
import { Link } from "@inertiajs/vue3";

import AppLayout from '@/Layouts/AppLayout.vue';
import Pagination from '@/Shared/Pagination.vue';

export default {
    components:{
        AppLayout,
        Link,
        Pagination
    },
    props:{
        appointments: Object
    }
}
</script>
