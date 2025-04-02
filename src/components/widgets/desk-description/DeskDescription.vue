<template>
  <div class="my-20">
    <h2 id="technical-description" class="h2 my-20">{{ $t('technical.description') }}</h2>

    <table class="desk_description">
      <tbody>
      <tr>
        <td>{{ $t('whiteboard') }}</td>
        <td>A4 (210 x 297 {{ $t('units.mm') }})</td>
      </tr>

      <tr>
        <td>{{ $t('holder.phone') }}</td>
        <td>127 x 11 {{ $t('units.mm') }}</td>
      </tr>

      <tr>
        <td>{{ $t('holder.tablet') }}</td>
        <td>310 x 11 {{ $t('units.mm') }}</td>
      </tr>

      <tr>
        <td>{{ $t('description.height') }}</td>
        <td>720 - 1160 {{ $t('units.mm') }}</td>
      </tr>

      <tr>
        <td>{{ $t('description.max.load') }}</td>
        <td>80 {{ $t('units.kg') }}</td>
      </tr>

      <tr>
        <td>{{ $t('description.mechanism.sound') }}</td>
        <td>48 {{ $t('units.decibels') }}</td>
      </tr>

      <tr>
        <td>{{ $t('description.drive.speed') }}</td>
        <td>21 {{ $t('units.mm.s') }}</td>
      </tr>

      <tr>
        <td>{{ $t('description.size') }}</td>
        <td>1200 x 600 x 36 {{ $t('units.mm') }}</td>
      </tr>

      <tr>
        <td>{{ $t('description.guarantee') }}</td>
        <td>2 {{ $t('units.years') }}</td>
      </tr>

      <tr>
        <td>{{ $t('description.tabletop.weight') }}</td>
        <td>17 {{ $t('units.kg') }}</td>
      </tr>

      <tr>
        <td>{{ $t('description.legs.weight') }}</td>
        <td>23 {{ $t('units.kg') }}</td>
      </tr>

      <tr>
        <td>{{ $t('description.total.weight') }}</td>
        <td>40 {{ $t('units.kg') }}</td>
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
