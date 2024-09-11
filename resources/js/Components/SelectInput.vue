<template>
  <select
    :id="id"
    :name="name"
    :class="`mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200`"
    :value="modelValue"
    @change="$emit('update:modelValue', $event.target.value)"
    required
  >
    <option value="" disabled>Select an option</option>
    <option v-for="option in options" :key="option.value" :value="option.value">
      {{ option.text }}
    </option>
  </select>
</template>

<script setup>
const props = defineProps({
  id: String,
  name: String,
  modelValue: [String, Number],
  options: Array,
});
</script>
