<template>
  <div class="my-20">
    <h2 id="technical-description" class="h2 my-20">Technical description</h2>

    <table class="desk_description">
      <tbody>
      <tr>
        <td>Whiteboard</td>
        <td>A4 (210x297 mm)</td>
      </tr>

      <tr>
        <td>Height</td>
        <td>72-116 cm</td>
      </tr>

      <tr>
        <td>Max load</td>
        <td>80 kg</td>
      </tr>

      <tr>
        <td>Mechanism sound</td>
        <td>48 decibels</td>
      </tr>

      <tr>
        <td>Drive speed</td>
        <td>21 mm/s</td>
      </tr>

      <tr>
        <td>Size</td>
        <td>1200 x 600 x 36 mm</td>
      </tr>

      <tr>
        <td>Guarantee</td>
        <td>2 years</td>
      </tr>

      <tr>
        <td>Tabletop weight</td>
        <td>17 Kg</td>
      </tr>

      <tr>
        <td>Legs weight</td>
        <td>23 Kg</td>
      </tr>

      <tr>
        <td>Total weight</td>
        <td>40 Kg</td>
      </tr>
      </tbody>
    </table>
  </div>
</template>

<script lang="ts" setup>
</script>

<style lang="scss" scoped>
@use '@/assets/css/_vars' as *;

.desk_description {
  margin: 0 auto #{2 * $space};
  max-width: 500px;

  td {
    padding: 1em 2em;

    &:nth-child(1) {
      border-right: 4px solid #fff;
      text-align: right;
    }
  }

  tr {
    background-color: #fff;

    &:nth-child(2n) {
      background-color: rgba(#000, 0.1);
    }
  }
}
</style>
