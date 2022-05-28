<?php


namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;
use App\Models\PostTag;
use App\Models\Tag;

class PostFilter extends AbstractFilter
{
    public const NAME = 'name';
    public const CHARCODE = 'charcode';
    public const TAG = 'tags';

    protected function getCallbacks(): array
    {
        return [
            self::NAME => [$this, 'name'],
            self::CHARCODE => [$this, 'charcode'],
            self::TAG => [$this, 'tag'],
        ];
    }

    public function name(Builder $builder, $value)
    {
        $builder->where('name', 'like', "%{$value}%");
    }

    public function charcode(Builder $builder, $value)
    {
        $builder->where('charcode', 'like', "%{$value}%");
    }

    public function tag(Builder $builder, $value)
    {
        $value = Tag::where('name', $value)->value('id');
        $postsIds = PostTag::where('tag_id', $value)->get()->pluck('post_id');
        //dd($postsIds);
        $builder->whereIn('id', $postsIds);
    }
}
