<template>
    <div class="container">
      <h2 class="text-2xl font-bold mb-4">Contact List</h2>
  
      <!-- File Upload for XML Import -->
      <input type="file" @change="uploadXML" class="mb-4" />
  
      <!-- Add New Contact Form -->
      <form @submit.prevent="addContact" class="mb-4">
        <input v-model="newContact.name" placeholder="Name" class="border p-2" />
        <input v-model="newContact.phone" placeholder="Phone" class="border p-2" />
        <button type="submit" class="bg-blue-500 text-white px-4 py-2">Add Contact</button>
      </form>
  
      <!-- Contacts Table -->
      <table class="w-full border-collapse border border-gray-200">
        <thead>
          <tr class="bg-gray-100">
            <th class="border p-2">Name</th>
            <th class="border p-2">Phone</th>
            <th class="border p-2">Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="contact in contacts" :key="contact.id">
            <td class="border p-2">{{ contact.name }}</td>
            <td class="border p-2">{{ contact.phone }}</td>
            <td class="border p-2">
              <!-- <button @click="editContact(contact)" class="text-blue-500">Edit</button> -->
              <button @click="deleteContact(contact.id)" class="text-red-500 ml-2">Delete</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </template>
  
  <script>
  import axios from "axios";
  
  export default {
    data() {
      return {
        contacts: [],
        newContact: { name: "", phone: "" },
      };
    },
    methods: {
      fetchContacts() {
        axios.get("/api/contacts").then((response) => {
          this.contacts = response.data;
        });
      },
      addContact() {
        axios.post("/api/contacts", this.newContact).then(() => {
          this.fetchContacts();
          this.newContact = { name: "", phone: "" };
        });
      },
      deleteContact(id) {
        axios.delete(`/api/contacts/${id}`).then(() => {
          this.fetchContacts();
        });
      },
      uploadXML(event) {
        let formData = new FormData();
        formData.append("file", event.target.files[0]);
  
        axios.post("/api/contacts/import-xml", formData, {
          headers: { "Content-Type": "multipart/form-data" },
        }).then(() => {
          this.fetchContacts();
        });
      },
    },
    mounted() {
      this.fetchContacts();
    },
  };
  </script>