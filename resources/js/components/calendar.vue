<template>
    <div class="calendar-container">
        <div v-for="(date, name, key) in calendar" :key="key">
            <h1 v-if="date.date === 1">{{date.month +' '+date.year}}</h1>
            <div :class="['date-wrapper', date.event ? 'scheduled': '']">
                <div class="date">{{date.date}} {{date.day.label}}</div>
                <div class="event" v-if="date.event">{{event_title}}</div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['calendar', 'event_title']
}
</script>

<style lang="scss" scoped>
    .calendar-container{
        width: 100%;
        border-bottom: 1px solid #9e9e9e;
        .date-wrapper {
            width: 100%;
            border-top: 1px solid #9e9e9e;
            padding: 20px 0px;
            display: flex;
            .date, .event {
                flex: 1;
                margin: 0px 20px;
            }
            &.scheduled {
                background-color: #71ff7763;
            }
        }
    }
</style>