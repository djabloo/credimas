<?php

namespace  App\DataMapper;

use http\QueryString;

final class  ListDataMapper extends AbstractDataMapper
{
    protected string $className;
    
    protected array $arguments;
    
    public  function __construct(array $list, String $className, array $arguments = [])
    { 
        parent::__construct($list);
        
        $this->className = $className;
        $this->arguments = $arguments;
    }
    
    public function toArray($request): array
    {
        return  $this->all($request);
    }
    
    public function all($request)
    {
        $list = [];
        
        foreach  ($this->resource as $data) {
            $list[] = (new $this->className($data, ...$this->arguments))->all($request);
        }
        return  $list;
    }
        
       
}










