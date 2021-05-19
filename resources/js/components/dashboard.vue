<template>
    <div class="dashboard-container">
        <div class="dashboard-container__wrapper">
            <h2>Calendar</h2>
            <div class="section-container">
                <section class="left">
                    <Input label="Event title" input_id="event_input" v-model="event_title"/>
                    <EventDate v-model="date"/>
                    <div class="checkbox-container">
                        <div v-for="(day, name, key) in days" :key="key">
                            <Checkbox :label="day.label" :checkbox_id="day.id" v-model="day.value"/>
                        </div>
                    </div>
                    <Button label="Save" :onClick="saveEvent"/>                
                </section>
                <section class="right">
                    <Calendar :calendar="calendar" :event_title="event_title"/>
                </section>                
            </div>
        </div>
    </div>
</template>

<script>
import Input from './base_components/input';
import Checkbox from './base_components/checkbox';
import Button from './base_components/button';
import EventDate from './eventdate';
import Calendar from './calendar';
export default {
    components: {Input, Checkbox, Button, EventDate, Calendar},
    data: function () {
        return {
            event_title: '',
            date: {
                from : {
                    label: 'From',
                    value: ''
                },
                to : {
                    label: 'To',
                    value: ''
                }
            },
            days: [
                {
                    label: 'Sun',
                    id: 'sun',
                    value: false
                },
                {
                    label: 'Mon',
                    id: 'mon',
                    value: false
                },
                {
                    label: 'Tue',
                    id: 'tue',
                    value: false
                },
                {
                    label: 'Wed',
                    id: 'wed',
                    value: false
                },
                {
                    label: 'Thu',
                    id: 'thu',
                    value: false
                },
                {
                    label: 'Fri',
                    id: 'fri',
                    value: false
                },
                {
                    label: 'Sat',
                    id: 'sat',
                    value: false
                },
            ],
            months_name: [
                    "January","February","March","April",
                    "May","June","July", "August",
                    "September","October","November","December"
                ],
            calendar: {},
        }
    },
    created() {
        this.getEvents();
    },
    methods: {
        getEvents(){
            Axios.get('/get-calendar').then((response)=> {
                this.addValueInput(response.data);
            })
        },
        addValueInput(data){
            this.event_title = data.event_title;
            this.date.from.value = data.from;
            this.date.to.value = data.to;
            this.days.map((e, k)=> {
                e.value = data.days[e.id];
            })
            this.countDate(data.from, data.to)
        },
        saveEvent(e) {
            var event_title = this.event_title,
                days = this.days,
                date = {
                    from: this.date.from.value,
                    to: this.date.to.value,
                };
            Axios.post('/update-calendar', {
                event_title,
                days,
                date
            }).then((response)=> {
                this.getEvents();
            })
        },
        countDate(from, to) {
            var from = new Date(from),
                to = new Date(to),
                from_date = from.getDate(),
                from_month = from.getMonth(),
                from_year = from.getFullYear(),
                to_month = to.getMonth(),
                to_date = to.getDate(),
                to_year = to.getFullYear();

            var formatted_calendar = this.formatCalendar(from_year, from_month)
            if(from_month == to_month){
                formatted_calendar.map((e, k)=> {
                    if(e.date >= from_date && e.date <= to_date){
                        e.event = e.day.value
                    }
                    e.month = this.months_name[e.month]
                })
            }else{
                var to_dates = [],
                    bet_month = to_month - from_month;
                for (let index = 1; index <= bet_month; index++) {
                    var d = this.formatCalendar(to_year, from_month+index)
                    d.forEach((e, k) => {
                        to_dates.push(e);
                    });
                }
                to_dates.map((e, k)=> {
                    if(e.month < to_month){
                        e.event = e.day.value
                    }else{
                        if(e.date >= from_date){
                            e.event = e.day.value
                        }
                    }
                    e.month = this.months_name[e.month]
                })
                formatted_calendar.map((e, k)=> {
                    if(e.date >= from_date){
                        e.event = e.day.value
                    }
                    e.month = this.months_name[e.month]
                })
                formatted_calendar.push(...to_dates);
            }
            this.calendar = formatted_calendar;
            
        },
        formatCalendar(year, month){
            var month_dates = new Date(year, month, 0).getDate(),
                months_detail = [];

            for (let index = 0; index < month_dates; index++) {
                var v = new Date(year, month, index+1).getDay();
                months_detail.push({
                    'day':this.days[v],
                    'date':index+1,
                    'month':month,
                    'year': year,
                    'event': false
                })
            }
            return months_detail;
        },
    }
}
</script>

<style lang="scss" scoped>
    .dashboard-container {
        padding: 60px;
        &__wrapper {
            height: 100%;
            background-color: white;
            border-radius: 20px;
            h2{
                padding: 20px;
                margin: 0px;
            }
            .section-container {
                display: flex;
                border-top: 1px solid #9e9e9e;
                padding: 30px;
            }
            .left {
                width: 35%;
                .checkbox-container {
                    display: flex;
                    margin-bottom: 20px;
                }
            }
            .right {
                width: 64%;
            }
        }
    }
</style>