<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\CodeGenerator\Business\Generator\Zed\Persistence\Propel\Schema;

use Spryker\Zed\CodeGenerator\Business\Generator\Zed\AbstractZedCodeGenerator;
use Zend\Filter\FilterChain;

class SchemaXmlCodeGenerator extends AbstractZedCodeGenerator
{
    /**
     * @return string
     */
    public function getSourceFile()
    {
        return 'Zed/Persistence/Propel/Schema/schema.xml.twig';
    }

    /**
     * @return string
     */
    public function getCodeGeneratorName()
    {
        return 'ZedPropelSchemaXml';
    }

    /**
     * @return string
     */
    public function getClassname()
    {
        return 'schema.xml';
    }

    /**
     * @return string
     */
    public function getTargetFile()
    {
        $fileName = $this->getBundle();
        $fileName = $this->getCamelCaseToUnderscoreFilter()->filter($fileName);

        return $this->joinPath([
            'Pyz/Zed',
            $this->getBundle(),
            'Persistence',
            'Propel/Schema',
            $this->getSchemaPrefix() . $fileName . '.schema.xml',
        ]);
    }

    /**
     * @return string
     */
    protected function getSchemaPrefix()
    {
        return 'pyz_';
    }

    /**
     * @return \Zend\Filter\FilterChain
     */
    protected function getCamelCaseToUnderscoreFilter()
    {
        $filter = new FilterChain();

        $filter->attachByName('WordCamelCaseToUnderscore');
        $filter->attachByName('StringToLower');

        return $filter;
    }
}
