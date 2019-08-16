@component('mail::message')
    <p>
        Title: {{ $articleData['title'] }}
    </p>
    <p>
        Author: {{ $articleData['author'] }}
    </p>
    <p>
        Submission Time: {{ $articleData['created_at'] }}
    </p>
    <p>
        Please let admin panel know, whom of you are working the this article.
    </p>

    @component('mail::button', ['url' => url('admin/edit-article/'.$articleData['article_id'])])
        Go To Article Link
    @endcomponent

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
