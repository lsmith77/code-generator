<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\CodeGenerator\Business\Engine;

interface GeneratorEngineInterface
{
    /**
     * @param string $source
     * @param array $vars
     *
     * @return string
     */
    public function generate($source, array $vars = []);
}
