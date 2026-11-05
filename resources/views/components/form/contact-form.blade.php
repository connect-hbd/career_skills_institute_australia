 @props([
    'courses'
])
<x-form.select-input name="course_id" label="Course" :options="$courses->pluck('name', 'id')->toArray()" />
