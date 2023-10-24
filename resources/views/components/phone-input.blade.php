@props([
  'errors' => ''
])

<div x-data="{ phoneNumbers: [] }" x-modelable="phoneNumbers" {{ $attributes}}>

  <template x-for="(phoneNumber, index) in phoneNumbers" :key="index">

    <div>
      <input
        type="text"
        x-model="phoneNumber"
        placeholder="Phone Number">

      <button
      type="button"
        @click="phoneNumbers.splice(index, 1)">
        Remove
      </button>

    </div>

  </template>

  <button
    @click="phoneNumbers.push('')"
    type="button">
    Add Phone Number
  </button>

</div>
