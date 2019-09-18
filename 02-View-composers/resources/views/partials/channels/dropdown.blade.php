<!-- Using coalescent operator to customize tag attributes -->
<select id="{{ $field ?? 'channel_id' }}" name="{{ $field ?? 'channel_id' }}">
    @foreach($channels as $channel)
        <option value="{{ $channel->id }}">{{ $channel->name }}</option>
    @endforeach
</select>
