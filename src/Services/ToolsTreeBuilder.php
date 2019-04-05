<?php
/**
 * part-db version 0.1
 * Copyright (C) 2005 Christoph Lechner
 * http://www.cl-projects.de/.
 *
 * part-db version 0.2+
 * Copyright (C) 2009 K. Jacobs and others (see authors.php)
 * http://code.google.com/p/part-db/
 *
 * Part-DB Version 0.4+
 * Copyright (C) 2016 - 2019 Jan Böhmer
 * https://github.com/jbtronics
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA
 */

namespace App\Services;

use App\Helpers\TreeViewNode;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Contracts\Translation\TranslatorInterface;

/**
 * This Service generates the tree structure for the tools.
 * @package App\Services
 */
class ToolsTreeBuilder
{

    protected $translator;
    protected $urlGenerator;

    public function __construct(TranslatorInterface $translator, UrlGeneratorInterface $urlGenerator)
    {
        $this->translator = $translator;
        $this->urlGenerator = $urlGenerator;
    }


    /**
     * Generates the tree for the tools menu.
     * @return TreeViewNode The array containing all Nodes for the tools menu.
     */
    public function getTree() : array
    {
        //TODO: Use proper values

        $nodes = array();
        $nodes[] = new TreeViewNode($this->translator->trans('tree.tools.edit.attachment_types'),
            $this->urlGenerator->generate('attachment_type_new'));
        $nodes[] = new TreeViewNode('Node 2');

        $tree[] = new TreeViewNode($this->translator->trans('tree.tools.edit'), null, $nodes);

        $show_nodes = array();
        $show_nodes[] = new TreeViewNode($this->translator->trans('tree.tools.show.all_parts'),
            $this->urlGenerator->generate('parts_show_all')
        );

        $tree[] = new TreeViewNode($this->translator->trans('tree.tools.show'), null, $show_nodes);

        return $tree;
    }
}
