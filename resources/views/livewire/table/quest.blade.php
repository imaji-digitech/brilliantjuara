<x-data-table :model="$quests">
    <x-slot name="head">
        <tr>
            <th scope="col" wire:click.prevent="sortBy('id')" >
                # @include('components.sort-icon',['field'=>"id"])
            </th>
            <th scope="col" wire:click.prevent="sortBy('question')" >
                Soal
            </th>
            <th>aksi</th>
        </tr>
    </x-slot>
    <x-slot name="body">
        @foreach ($quests as $index=>$quest)
            <tr x-data="window.__controller.dataTableController({{ $quest->id }})">
                <td scope="row">{{ ($page-1)*$perPage+$index+1 }}</td>
                <td>{{ \Illuminate\Support\Str::limit(strip_tags($quest->question), 150, $end='...') }}</td>
                <td>
{{--                    <a role="button" href="{{ route('admin.quest.edit',[$quest->room->slug,$quest->id]) }}" class="mr-3">--}}
{{--                        <i class="fa fa-16px fa-pen">Ubah</i></a>--}}
{{--                    <a role="button" href="{{ route('admin.quest.show',[$quest->room->slug,$quest->slug]) }}" class="mr-3">--}}
{{--                        <i class="fa fa-16px fa-eye">Lihat</i></a>--}}
{{--                    <a role="button" href="{{ route('admin.quest.index',$quest->slug) }}" class="mr-3">--}}
{{--                        <i class="fa fa-16px fa-book">Bimbel</i></a>--}}
                </td>
            </tr>
        @endforeach
    </x-slot>
</x-data-table>
