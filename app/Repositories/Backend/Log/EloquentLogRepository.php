<?php

namespace App\Repositories\Backend\Log;

use App\Models\Log\Log;
use App\Models\Log\LogType;


class EloquentLogRepository implements LogContract
{
    /**
     * Pagination type
     * paginate: Prev/Next with page numbers
     * simplePaginate: Just Prev/Next arrows.
     *
     * @var string
     */
    private $paginationType = 'simplePaginate';

    /**
     * @param $type
     * @param $text
     * @param null $entity_id
     * @param null $icon
     * @param null $class
     * @param null $assets
     *
     * @return bool|static
     */
    public function log($type, $text, $entity_id = null, $icon = null, $class = null, $assets = null)
    {
        //Type can be id or name
        if (is_numeric($type)) {
            $type = LogType::findOrFail($type);
        } else {
            $type = LogType::where('name', $type)->first();
        }

        if ($type instanceof LogType) {
            return LogType::create([
                'type_id'   => $type->id,
                'text'      => $text,
                'user_id'   => access()->id(),
                'entity_id' => $entity_id,
                'icon'      => $icon,
                'class'     => $class,
                'assets'    => is_array($assets) && count($assets) ? json_encode($assets) : null,
            ]);
        }

        return false;
    }

    /**
     * @param null $limit
     * @param bool $paginate
     * @param int  $pagination
     *
     * @return string|\Symfony\Component\Translation\TranslatorInterface
     */
    public function render($limit = null, $paginate = true, $pagination = 10)
    {
        $log = Log::with('user')->latest();
        $log = $this->buildPagination($log, $limit, $paginate, $pagination);
        if (! $log->count()) {
            return 'none';
        }

        return $this->buildList($log, $paginate);
    }

    /**
     * @param $type
     * @param null $limit
     * @param bool $paginate
     * @param int  $pagination
     *
     * @return string|\Symfony\Component\Translation\TranslatorInterface
     */
    public function renderType($type, $limit = null, $paginate = true, $pagination = 10)
    {
        $log = Log::with('user');
        $log = $this->checkType($log, $type);
        $log = $this->buildPagination($log, $limit, $paginate, $pagination);
        if (! $log->count()) {
            return 'none_for_type';
        }

        return $this->buildList($log, $paginate);
    }

    /**
     * @param $type
     * @param $entity_id
     * @param null $limit
     * @param bool $paginate
     * @param int  $pagination
     *
     * @return string|\Symfony\Component\Translation\TranslatorInterface
     */
    public function renderEntity($type, $entity_id, $limit = null, $paginate = true, $pagination = 10)
    {
        $log = Log::with('user', 'type')->where('entity_id', $entity_id);
        $log = $this->checkType($log, $type);
        $log = $this->buildPagination($log, $limit, $paginate, $pagination);
        if (! $log->count()) {
            return 'none_for_entity';
        }

        return $this->buildList($log, $paginate);
    }

    /**
     * @param $text
     * @param bool $assets
     *
     * @return mixed|string
     */
    public function renderDescription($text, $assets = false)
    {
        $assets = json_decode($assets, true);
        $count = 1;
        $asset_count = count($assets) + 1;

        if (count($assets)) {
            foreach ($assets as $name => $values) {
                switch ($name) {
                    case 'string':
                        ${'asset_'.$count} = $values;
                        break;

                    //Cant have link be multiple array keys, allows for link, link1, link2, etc.
                    case substr($name, 0, 4) == 'link':
                        if (is_array($values)) {
                            switch (count($values)) {
                                case 1:
                                    ${'asset_'.$count} = link_to_route($values[0], $values[0]);
                                    break;

                                case 2:
                                    ${'asset_'.$count} = link_to_route($values[0], $values[1]);
                                    break;

                                case 3:
                                    ${'asset_'.$count} = link_to_route($values[0], $values[1], $values[2]);
                                    break;

                                default:
                                    break;
                            }
                        } else {
                            //Normal url
                            ${'asset_'.$count} = link_to($values, $values);
                        }
                        break;

                    default:
                        break;
                }

                $text = str_replace('$'.$count, ${'asset_'.$count}, $text);
                $count++;
            }
        }

        if ($asset_count == $count) {
            //Evaluate all trans functions as PHP
            //We don't want to use eval() for security reasons so we're explicitly converting trans cases
            return preg_replace_callback('/trans\(\"([^"]+)\"\)/', function ($matches) {
                return trans($matches[1]);
            }, $text);
        }

        return '';
    }

    /**
     * @param $log
     * @param bool $paginate
     *
     * @return string
     */
    public function buildList($log, $paginate = true)
    {
        return 'list';
    }

    /**
     * @param $query
     * @param $limit
     * @param $paginate
     * @param $pagination
     *
     * @return mixed
     */
    public function buildPagination($query, $limit, $paginate, $pagination)
    {
        if ($paginate && is_numeric($pagination)) {
            return $query->{$this->paginationType}($pagination);
        } else {
            if ($limit && is_numeric($limit)) {
                $query->take($limit);
            }

            return $query->get();
        }
    }

    /**
     * @param $query
     * @param $type
     *
     * @return mixed
     */
    private function checkType($query, $type)
    {
        if (is_numeric($type)) {
            return $query->where('type_id', $type)->latest();
        } else {
            $type = strtolower($type);

            return $query->whereHas('type', function ($query) use ($type) {
                $query->where('name', ucfirst($type));
            })->latest();
        }
    }
}
